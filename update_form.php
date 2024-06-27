<?php
include 'Database.php';
include 'User.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['matric'])) {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Form</title>
    <link rel="stylesheet" href="assets/login/style.css" />
</head>
<body>
    <section class="container">
        <header>Update Form</header>
        <form action="update.php" class="form" method="post">
            <div class="input-box">
                <input id="matric" name="matric" type="hidden" value="<?php echo $userDetails['matric']; ?>" />
            </div>

            <div class="input-box">
                <label>Name</label>
                <input id="name" name="name" type="text" value="<?php echo $userDetails['name']; ?>" required />
            </div>

            <div class="input-box">
                <label>Role :</label>
                <div class="select-box">
                    <select id="role" name="role" required>
                        <option value="Lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
                        <option value="Student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
                    </select>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>

    <?php
} else {
    echo "Error: Matric number not provided.";
}
?>
