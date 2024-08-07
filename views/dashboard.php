<?php
include_once 'components/admin_navbar.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?php echo $_SESSION['admin_name']; ?></h2>

        <div class=row>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estudiantes</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Gestión de estudiantes</h6>
                        <a href="index.php?action=add_student" class="btn btn-secondary btn-add">Añadir estudiante</a>
                        <a href="index.php?action=list_students" class="btn btn-secondary btn-list">Listar estudiantes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Asignaturas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Gestión de asignaturas </h6>
                        <a href="index.php?action=add_subject" class="btn btn-secondary btn-add">Añadir asignatura</a>
                        <a href="index.php?action=list_subjects" class="btn btn-secondary btn-list">Listar asignaturas</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profesor</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Gestión de profesores </h6>
                        <a href="index.php?action=add_professor" class="btn btn-secondary btn-add">Añadir profesor</a>
                        <a href="index.php?action=list_professors" class="btn btn-secondary btn-list">Listar profesores</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Matrículas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Gestión de matrículas </h6>
                        <a href="index.php?action=add_enrollment" class="btn btn-secondary btn-add">Añadir matrícula</a>
                        <a href="index.php?action=list_enrollments" class="btn btn-secondary btn-list">Listar matrículas</a>

                    </div>
                </div>
            </div>
        </div>

    


    <a href="logout.php" class="btn btn-secondary btn-logout">Cerrar sesión</a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>