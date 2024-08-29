<?php
include_once 'conn/config.php';
include_once 'models/Professor.php';

class ProfessorController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Professor($conn);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            if ($this->model->add($nombre, $email)) {
                header('Location: index.php?action=list_professors');
            } else {
                echo "Error al añadir profesor.";
            }
        } else {
            include 'views/professor/add_professor.php';
        }
    }

    public function list() {
        $professors = $this->model->getAll();
        include 'views/professor/list_professors.php';
    }
}
?>
