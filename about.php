<?php include 'components/index_navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca del sistema de matrículas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #ffffff; /* Fondo blanco */
        }
        .shadow-box {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
            border-radius: 10px; /* Bordes redondeados para un look moderno */
            background-color: #fff; /* Fondo blanco para los componentes */
        }
    </style>
</head>
<body>
    <header>
        <?php include 'header-template.php'; ?>
    </header>

    <div class="container mt-5">
        <!-- Primera sección: Título y descripción -->
        <div class="row align-items-center shadow-box p-4 mb-4">
            <div class="col-md-6">
                <span class="text-uppercase text-muted">Cómo empezó</span>
                <h1 class="display-4">Nuestro sueño es la Transformación del Aprendizaje Global</h1>
                <p class="mt-4 lead">Bienvenido al sistema de matrículas para gestión educativa. Este sistema está diseñado para facilitar la administración de estudiantes, asignaturas, profesores y matrículas en instituciones educativas.</p>
            </div>
            <div class="col-md-6">
                <img src="pexels-droosmo-2982449.jpg" alt="FotoAbout" class="img-fluid rounded">
            </div>
        </div>

        <!-- Segunda sección: Características principales -->
        <div class="shadow-box p-4 mb-4">
            <h2 class="mb-4">Características principales</h2>
            <div class="row">
                <div class="col-md-6">
                <ul class="list-group mb-4">
    <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Gestión de Administración:</strong> Modulo de información para administradores.</li>
    <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Gestión de Eventos:</strong> Crear, organizar y monitorear eventos académicos, reuniones y actividades escolares.</li>
    <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Gestión de Mensajes:</strong> Administrar la comunicación entre padres a través de un sistema centralizado de mensajería.</li>
</ul>

                </div>
                <div class="col-md-6">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Gestión de matrículas:</strong> Permite la matrícula de estudiantes en las asignaturas disponibles.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Interfaz amigable:</strong> Diseño intuitivo para una mejor experiencia de usuario.</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Acceso seguro:</strong> Asegura la privacidad y seguridad de la información.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tercera sección: Resumen estadístico -->
        <div class="row text-center mt-5">
            <div class="col-md-3">
                <div class="card p-4 shadow-box">
                    <h2>15 semanas</h2>
                    <p class="text-muted">Tiempo de desarollo</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 shadow-box">
                    <h2>100K</h2>
                    <p class="text-muted">Desafíos del Proyecto</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 shadow-box">
                    <h2>4+</h2>
                    <p class="text-muted">Reseñas Positivas</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4 shadow-box">
                    <h2>4</h2>
                    <p class="text-muted">Estudiantes Confiados</p>
                </div>
            </div>
        </div>

        <!-- Cuarta sección: Llamada a la acción -->
        <div class="card mt-5 shadow-box">
            <div class="card-body text-center">
                <h4 class="card-title">¿Por qué elegir nuestro sistema?</h4>
                <p class="card-text">Este sistema de matrículas está diseñado para hacer que la administración educativa sea más eficiente, confiable y fácil de usar.</p>
                <a href="#" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>

    <footer style="text-align: center; padding: 20px;">
        <?php include 'footer-template.php'; ?>
    </footer>
</body>
</html>
