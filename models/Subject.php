<?php
class Subject {
    private $conn;
    private $table = 'asignaturas'; // Asegúrate de que el nombre de la tabla es correcto

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($nombre, $descripcion) {
        $sql = "INSERT INTO $this->table (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Error en prepare: ' . $this->conn->error);
        }
        $stmt->bind_param('ss', $nombre, $descripcion);
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
