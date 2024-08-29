<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleAdmin.css">
</head>

<body>
    <header>
        <?php include 'headerAdmin.php'; ?>
    </header>
    <div class="container">
        <div class="profile-info card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Solicitud de matrícula en línea</span>
                <div>
                <a href="listaDeMatriculas.php" class="btn btn-close btn-sm">Regresar</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 info">
                        <strong>Nombre:</strong> Maria Gonzales
                    </div>
                    <div class="col-md-3 info">
                        <strong>Cedula:</strong> 1-1111-1111
                    </div>
                    <div class="col-md-3 info">
                        <strong>ID de solicitud:</strong> #123
                    </div>
                    <div class="col-md-3 info">
                        <strong>Grado:</strong> 6 año
                    </div>
                </div>
            </div>
        </div>
        <div class="assessment-summary card">
            <div class="card-header">Resumen de la matrícula</div>
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#details">Detalles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#documents">Documentos</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane container active" id="details">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Campo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Estado de matrícula</td>
                                        <td>Pendiente</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de última actualización</td>
                                        <td>25/02/2024</td>
                                    </tr>
                                    <!-- Agrega más filas aquí según sea necesario -->
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-3">
                            <button class="btn btn-reject">Rechazar Solicitud</button>
                            <button class="btn btn-accept">Aceptar Solicitud</button>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="documents">
                        <p>Contenido de documentos...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>