<?php include_once 'components/admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir matrícula</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Añadir matrícula</h2>
        <form action="index.php?action=add_enrollment" method="post">
            <div class="mb-3">
                <label for="estudiante_id">Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                    <!-- Aquí irán los estudiantes disponibles -->
                     <?php foreach ($students as $student): ?>
                        <option value="<?php echo htmlspecialchars($student['id']); ?>"><?php echo htmlspecialchars($student['nombre']); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="asignatura_id">Asignatura</label>
                <select name="asignatura_id" id="asignatura_id" class="form-control" required>
                    <!-- Aquí irán las asignaturas disponibles -->
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?php echo htmlspecialchars($subject['id']); ?>"><?php echo htmlspecialchars($subject['nombre']); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="profesor_id">Profesor</label>
                <select name="profesor_id" id="profesor_id" class="form-control" required>
                    <!-- Aquí irán los profesores disponibles -->
                    <?php foreach ($professors as $professor): ?>
                        <option value="<?php echo htmlspecialchars($professor['id']); ?>"><?php echo htmlspecialchars($professor['nombre']); ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-add">Añadir Matrícula</button>

            <a href="index.php?action=dashboard" class="btn btn-secondary btn-back">Regresar</a>

        </form>

    </div>


    <?php include_once 'components/footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
