<?php
include_once 'conn/config.php';
include_once 'models/Subject.php';

class SubjectController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Subject($conn);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            if ($this->model->add($nombre, $descripcion)) {
                header('Location: index.php?action=list_subjects');
            } else {
                echo "Error al añadir asignatura.";
            }
        } else {
            include 'views/subject/add_subject.php';
        }
    }

    public function list() {
        $asignaturas = $this->model->getAll();
        include 'views/subject/list_subjects.php';
    }
}
?>
