<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $result = $user->updateUser($matric, $name, $role);

    // Close the connection
    $db->close();

    // Redirect to read.php after update
    if ($result === true) {
        echo '<script type="text/javascript">';
        echo 'alert("User has been updated successfully.");';
        echo 'window.location.href = "read.php";';
        echo '</script>';
        exit();
    } else {
        echo $result; // Display error message
    }
} else {
    echo "Error: Invalid request method.";
}
?>
