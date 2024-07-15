<?php
require_once '../config/config.php';

class Subject {
    public $id;
    public $name;
    public $created_at;

    public function __construct($name, $id = null) {
        $this->name = $name;
        $this->id = $id;
        $this->created_at = date('Y-m-d H:i:s'); // Asignamos la fecha actual
    }

    public function save() {
        $connection = connect();
        $statement = $connection->prepare("INSERT INTO subjects (name, created_at) VALUES (?, ?)");
        $statement->bind_param('ss', $this->name, $this->created_at); // Solo necesitamos 'ss' para dos cadenas
        $statement->execute();
        $statement->close();
        $connection->close();
    }

    public static function all() {
        $connection = connect();
        $result = $connection->query("SELECT * FROM subjects");
        $subjects = [];
        while ($row = $result->fetch_assoc()) {
            $subjects[] = new Subject($row['name'], $row['id']);
        }
        $connection->close();
        return $subjects;
    }

    public static function find($id) {
        $connection = connect();
        $statement = $connection->prepare("SELECT * FROM subjects WHERE id = ?");
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $subject = new Subject($row['name'], $row['id']);
        $statement->close();
        $connection->close();
        return $subject;
    }

    public function update() {
        $connection = connect();
        $statement = $connection->prepare("UPDATE subjects SET name = ? WHERE id = ?");
        $statement->bind_param('si', $this->name, $this->id);
        $statement->execute();
        $statement->close();
        $connection->close();
    }
}
?>
