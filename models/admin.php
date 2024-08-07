<?php
class Admin {
    private $conn;
    private $table = 'administradores';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($nombre, $email, $password) {
        $sql = "INSERT INTO $this->table (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $nombre, $email, $password);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
