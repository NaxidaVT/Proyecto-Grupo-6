<?php
require_once '../config/config.php';

class Teacher {
    public $id;
    public $name;
    public $email;

    public function __construct($name, $email, $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }

    public function save() {
        $connection = connect();
        $statement = $connection->prepare("INSERT INTO teachers (name, email) VALUES (?, ?)");
        $statement->bind_param('ss', $this->name, $this->email);
        $statement->execute();
        $statement->close();
        $connection->close();
    }

    public static function all() {
        $connection = connect();
        $result = $connection->query("SELECT * FROM teachers");
        $teachers = [];
        while ($row = $result->fetch_assoc()) {
            $teachers[] = new Teacher($row['name'], $row['email'], $row['id']);
        }
        $connection->close();
        return $teachers;
    }

    public static function find($id) {
        $connection = connect();
        $statement = $connection->prepare("SELECT * FROM teachers WHERE id = ?");
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        $teacher = new Teacher($row['name'], $row['email'], $row['id']);
        $statement->close();
        $connection->close();
        return $teacher;
    }

    public function update() {
        $connection = connect();
        $statement = $connection->prepare("UPDATE teachers SET name = ?, email = ? WHERE id = ?");
        $statement->bind_param('ssi', $this->name, $this->email, $this->id);
        $statement->execute();
        $statement->close();
        $connection->close();
    }
}
?>
