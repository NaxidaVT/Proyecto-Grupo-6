<?php
class Student {
    private $conn;
    private $table = 'estudiantes';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($nombre, $email) {
        $sql = "INSERT INTO $this->table (nombre, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombre, $email);
        return $stmt->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
