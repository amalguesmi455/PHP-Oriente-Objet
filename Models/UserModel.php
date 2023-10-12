<?php

class UserModel {
    private $conn; // Database connection

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Add a method to check if the provided email and password are correct
    public function checkCredentials($email, $password) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0; // Return true if a matching user is found
    }

    public function getAllUsers() {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function addUser($email, $password, $username, $Prenom) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO users (email, password, nom, prenom) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $email, $password, $username, $Prenom);
        $stmt->execute();
    }

    public function updateUser($id, $user) {
        // Implement the update logic as needed
    }

    public function deleteUser($id) {
        // Implement the delete logic as needed
    }
}
