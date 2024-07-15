<?php
require_once '../config/config.php';

// Función autoload para cargar automáticamente las clases de controladores
spl_autoload_register(function ($class) {
    if (file_exists('../controllers/' . $class . '.php')) {
        require_once '../controllers/' . $class . '.php';
    }
});

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
$url = explode('/', $url);

$controllerName = ucfirst($url[0]) . 'Controller';
$method = isset($url[1]) ? $url[1] : 'index';

if (file_exists('../controllers/' . $controllerName . '.php')) {
    $controller = new $controllerName(); // Crear instancia sin argumentos
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Method $method not found in controller $controllerName.";
    }
} else {
    echo "Controller $controllerName not found.";
}
?>
