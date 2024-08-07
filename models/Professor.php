<?php
class Professor {
    private $conn;
    private $table = 'profesores'; // Asegúrate de que el nombre de la tabla es correcto

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($nombre, $email) {
        $sql = "INSERT INTO $this->table (nombre, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Error en prepare: ' . $this->conn->error);
        }
        $stmt->bind_param('ss', $nombre, $email);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
