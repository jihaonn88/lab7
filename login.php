<?php
session_start();

include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = trim($_POST['matric']);
    $password = trim($_POST['password']);

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userInfo = $user->getUser($matric);

    $db->close();

    if ($userInfo) {
        // Check if the password matches
        if (password_verify($password, $userInfo['password'])) {
            $_SESSION['matric'] = $userInfo['matric'];
            $_SESSION['name'] = $userInfo['name'];
            header("Location: read.php");
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid password.");';
            echo 'window.history.back();';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid matric number.");';
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
