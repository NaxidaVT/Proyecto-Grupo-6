<?php
require_once '../models/Teacher.php';

class TeacherController {
    public function index() {
        $teachers = Teacher::all();
        require_once '../views/teachers/index.php';
    }

    public function create() {
        require_once '../views/teachers/create.php';
    }

    public function store() {
        $teacher = new Teacher($_POST['name'], $_POST['email']);
        $teacher->save();
        header('Location: /proyecto_matricula/public/teacher');
    }

    public function edit() {
        $id = $_GET['id'];
        $teacher = Teacher::find($id);
        require_once '../views/teachers/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $teacher = Teacher::find($id);
        $teacher->name = $name;
        $teacher->email = $email;
        $teacher->update();

        header('Location: /proyecto_matricula/public/teacher');
    }
}
?>
