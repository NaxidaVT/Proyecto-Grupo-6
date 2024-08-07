<?php
include_once 'conn/config.php';
include_once 'models/Enrollment.php';

class EnrollmentController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Enrollment($conn);
    }

    public function add() {
        global $conn;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $estudiante_id = $_POST['estudiante_id'];
            $asignatura_id = $_POST['asignatura_id'];
            $profesor_id = $_POST['profesor_id'];
            if ($this->model->add($estudiante_id, $asignatura_id, $profesor_id)) {
                header('Location: index.php?action=list_matriculas');
            } else {
                echo "Error al añadir matrícula.";
            }
        } else {
            // Consultar los datos para llenar los selects
            $studentModel = new Student($conn);
            $students = $studentModel->getAll();
            $subjectModel = new Subject($conn);
            $subjects = $subjectModel->getAll();
            $professorModel = new Professor($conn);
            $professors = $professorModel->getAll();
            
            include 'views/enrollment/add_enrollment.php';
        }
    }
    

    public function list() {
        $matriculas = $this->model->getAll();
        include 'views/enrollment/list_enrollments.php';
    }
}
?>
