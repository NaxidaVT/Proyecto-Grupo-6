<?php
include_once 'conn/config.php';
include_once 'models/Admin.php';

class AuthController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Admin($conn);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->model->register($nombre, $email, $password)) {
                header('Location: index.php');
            } else {
                echo "Error en el registro.";
            }
        } else {
            include 'views/auth/register.php';
        }
    }

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->login($email, $password);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_name'] = $user['nombre'];
                header('Location: index.php?action=dashboard');
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            include 'views/auth/login.php';
        }
    }
    
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}    
?>