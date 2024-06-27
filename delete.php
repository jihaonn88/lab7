<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);
    $user->deleteUser($matric);

    // Close the connection
    $db->close();

    // Use JavaScript to show an alert and then redirect
    echo '<script type="text/javascript">';
    echo 'alert("User has been deleted successfully.");';
    echo 'window.location.href = "read.php";';
    echo '</script>';
}
?>
