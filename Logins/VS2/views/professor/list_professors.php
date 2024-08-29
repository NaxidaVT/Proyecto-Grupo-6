<?php include_once 'components/admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de profesores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado de profesores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($professors)): ?>
                    <?php foreach ($professors as $professor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($professor['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($professor['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center">No hay profesores registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
        <a href="index.php?action=add_professor" class="btn btn-secondary btn-add">Añadir profesor</a>
            <a href="index.php?action=dashboard" class="btn btn-secondary btn-back">Regresar</a>
        </div>
    </div>


    <?php include_once 'components/footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
