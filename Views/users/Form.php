<?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$database = "projet";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a session
session_start();

// Include necessary files and dependencies
require_once 'models/UserModel.php';
require_once 'controllers/UserController.php';

// Instantiate UserController
$userController = new UserController($conn);

// Handle your routes and trigger the appropriate controller method based on user actions.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    // User submitted login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Handle user login
    $userController->connexion($email, $password);
}

// Close the database connection
$conn->close();
?>
