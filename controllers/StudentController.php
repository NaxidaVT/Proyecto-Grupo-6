<?php
require_once '../models/Student.php';

class StudentController {
    public function index() {
        $students = Student::all();
        require_once '../views/students/index.php';
    }

    public function create() {
        require_once '../views/students/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $student = Student::find($id);
        require_once '../views/students/edit.php';
    }

    public function store() {
        $student = new Student($_POST['name'], $_POST['email']);
        $student->save();
        header('Location: /proyecto_matricula/public/student');
    }


    public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $student = Student::find($id);
        $student->name = $name;
        $student->email = $email;
        $student->update();
        
        header('Location: /proyecto_matricula/public/student');
    }
    
    

    


}
?>
