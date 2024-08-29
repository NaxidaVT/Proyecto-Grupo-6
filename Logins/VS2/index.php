<?php
session_start();

require 'conn/config.php';
require 'controllers/AuthController.php';
require 'controllers/StudentController.php';
require 'controllers/SubjectController.php';
require 'controllers/ProfessorController.php';
require 'controllers/EnrollmentController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'dashboard':
        if (isset($_SESSION['admin_id'])) {
            include 'views/dashboard.php';
        } else {
            header('Location: index.php');
        }
        break;
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'add_student':
        if (isset($_SESSION['admin_id'])) {
            $controller = new StudentController();
            $controller->add();
        } else {
            header('Location: index.php');
        }
        break;
    case 'list_students':
        if (isset($_SESSION['admin_id'])) {
            $controller = new StudentController();
            $controller->list();
        } else {
            header('Location: index.php');
        }
        break;
    case 'add_subject':
        if (isset($_SESSION['admin_id'])) {
            $controller = new SubjectController();
            $controller->add();
        }
        break;
    case 'list_subjects':
        if (isset($_SESSION['admin_id'])) {
            $controller = new SubjectController();
            $controller->list();
        }
        break;
    case 'add_professor':
        if (isset($_SESSION['admin_id'])) {
            $controller = new ProfessorController();
            $controller->add();
        }
        break;
    case 'list_professors':
        if (isset($_SESSION['admin_id'])) {
            $controller = new ProfessorController();
            $controller->list();
        }
        break;

    case 'add_enrollment':
        if (isset($_SESSION['admin_id'])) {
            $controller = new EnrollmentController();
            $controller->add();
        }
        break;

    case 'list_enrollments':
        if (isset($_SESSION['admin_id'])) {
            $controller = new EnrollmentController();

            $controller->list();
        }
        break;
    default:
        include 'views/auth/login.php';
}
