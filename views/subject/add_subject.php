<?php include_once 'components/admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir asignatura</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Añadir asignatura</h2>
        <form action="index.php?action=add_subject" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Escriba nombre de la asignatura">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required placeholder="Escriba descripción de la asignatura"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary btn-add">Añadir asignatura</button>
        </form>
        <a href="index.php?action=dashboard" class="btn btn-secondary btn-back mt-3">Regresar</a>
    </div>

    <?php include_once 'components/footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
