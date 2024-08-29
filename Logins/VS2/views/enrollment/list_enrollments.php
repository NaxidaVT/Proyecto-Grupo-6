<?php include_once 'components/admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de matrículas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado de matrículas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Asignatura</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($matriculas)): ?>
                    <?php foreach ($matriculas as $matricula): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($matricula['estudiante']); ?></td>
                            <td><?php echo htmlspecialchars($matricula['asignatura']); ?></td>
                            <td><?php echo htmlspecialchars($matricula['profesor']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay matrículas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-3">
        <a href="index.php?action=add_enrollment" class="btn btn-secondary btn-add">Añadir matrícula</a>
            <a href="index.php?action=dashboard" class="btn btn-secondary btn-back">Regresar</a>
        </div>
    </div>

    <?php include_once 'components/footer.php'; ?>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
