<?php

require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            // Check if credentials are correct using the model
            $credentialsCorrect = $this->userModel->checkCredentials($email, $password);

            if ($credentialsCorrect) {
                // Set a session variable to mark the user as authenticated
                $_SESSION['authenticated'] = true;

                // Redirect to admin.php if the credentials are correct
                header("Location: /projet1/PHP-Oriente-Objet/Views/admin.php");
                exit; // Ensure the script stops executing after the redirect
            } else {
                // Display an error message or stay on login.php
                echo "Invalid email or password. Please try again.";
            }
        } else {
            // Include your login form view
            include('login.php');
        }
    }

    public function allUsers() {
        $usersList = $this->userModel->getAllUsers();
        include('admin.php');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST["Nom"];
            $Prenom = $_POST["Prenom"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $this->userModel->addUser($email, $password, $username, $Prenom);
            header('Location: /projet1/PHP-Oriente-Objet/Views/admin.php');
        } else {
            include('views/Form.php');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST;
            $this->userModel->updateUser($id, $user);
            header('Location: /projet1/PHP-Oriente-Objet/Views/admin.php');
        } else {
            $user = $this->userModel->getAllUsers()[$id];
            include('views/Form.php');
        }
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: /projet1/PHP-Oriente-Objet/Views/admin.php');
    }
}
