<?php
require_once '../models/Subject.php';

class SubjectController {
    public function index() {
        $subjects = Subject::all();
        require_once '../views/subjects/index.php';
    }

    public function create() {
        require_once '../views/subjects/create.php';
    }

    public function store() {
        $subject = new Subject($_POST['name'], $_POST['code']);
        $subject->save();
        header('Location: /proyecto_matricula/public/subject');
    }

    public function edit() {
        $id = $_GET['id'];
        $subject = Subject::find($id);
        require_once '../views/subjects/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $code = $_POST['code'];

        $subject = Subject::find($id);
        $subject->name = $name;
        $subject->code = $code;
        $subject->update();

        header('Location: /proyecto_matricula/public/subject');
    }
}
?>
