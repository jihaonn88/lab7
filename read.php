<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['matric']) || !isset($_SESSION['name'])) {
    // User is not logged in, display an alert and then redirect to the login page
    echo '<script type="text/javascript">';
    echo 'alert("You must be logged in to access this page.");';
    echo 'window.location.href = "loginform.php";';
    echo '</script>';
    exit();
}
 
// Include database and user files
include 'Database.php';
include 'User.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Retrieve all users
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Info Table</title>
    <link rel="stylesheet" href="assets/table/style.css">
</head>
<body>
    <div class="header">
        <span>Hello There ! 👋</span>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <table class="content-table">
        <thead>
          <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
                if ($result->num_rows > 0) {
                    // Fetch each row from the result set
                    while ($row = $result->fetch_assoc()) {
                        ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($row["matric"]); ?> </td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td> <?php echo htmlspecialchars($row["role"]); ?> </td>
                        <td>
                            <a href="update_form.php?matric=<?php echo htmlspecialchars($row["matric"]); ?>" class="status pending" style="text-decoration: none;">Edit</a>
                            <a href="delete.php?matric=<?php echo htmlspecialchars($row["matric"]); ?>" class="status cancelled" style="text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                // Close connection
                $db->close();
                ?>
          </tbody>
      </table>
</body>
</html>
