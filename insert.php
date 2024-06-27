<?php
session_start();

include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $result = $user->createUser($matric, $name, $password, $role);

    // Check the result and start session if successful
    if ($result === true) {
        // Set session variables
        $_SESSION['matric'] = $matric;
        $_SESSION['name'] = $name;

        // Close the connection
        $db->close();

        // Redirect to read.php
        echo '<script type="text/javascript">';
        echo 'alert("User has been created successfully.");';
        echo 'window.location.href = "read.php";';
        echo '</script>';
    } else {
        // Close the connection
        $db->close();

        // Display error message
        echo '<script type="text/javascript">';
        echo 'alert("' . $result . '");';
        echo 'window.history.back();';
        echo '</script>';
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Error: Invalid request method.");';
    echo 'window.history.back();';
    echo '</script>';
}
?>
