<?php include_once 'components/admin_navbar.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir profesor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Añadir profesor</h2>
        <form action="index.php?action=add_professor" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Escriba nombre del profesor">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Escriba correo del profesor">
            </div>
            <button type="submit" class="btn btn-secondary btn-add">Añadir profesor</button>
            <a href="index.php?action=dashboard" class="btn btn-secondary btn-back">Regresar</a>
        </form>
    </div>



    <?php include_once 'components/footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
