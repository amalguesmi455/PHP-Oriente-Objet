<?php
session_start();

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$database = "projet";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
die($result->num_rows> 0);
    if ( $result->num_rows> 0) {
        // Credentials are correct, set session variable
        $_SESSION['authenticated'] = true;
        $_SESSION['user'] = $result->rows[0];
        header("Location: /projet1/PHP-Oriente-Objet/Views/admin.php");
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header("Location: /projet1/PHP-Oriente-Objet/Views/users/login.php?error=Invalid email or password. Please try again.");
    }
}
?>
