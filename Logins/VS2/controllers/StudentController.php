<?php
include_once 'conn/config.php';
include_once 'models/Student.php';

class StudentController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Student($conn);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            if ($this->model->add($nombre, $email)) {
                header('Location: dashboard.php');
            } else {
                echo "Error al añadir estudiante.";
            }
        } else {
            include 'views/student/add_student.php';
        }
    }

    public function list() {
        $estudiantes = $this->model->getAll();
        include 'views/student/list.php';
    }
}
?>
