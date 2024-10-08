<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Matricula Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .profile-info,
        .assessment-summary {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .profile-info h5,
        .assessment-summary h5 {
            font-weight: bold;
        }

        .profile-info .info,
        .assessment-summary .info {
            margin-bottom: 10px;
        }

        .form-control {
            background-color: #f5f5f5;
            border: none;
        }

        .btn-save {
            background-color: #6b6bf1;
            color: #fff;
        }

        .btn-save:hover {
            background-color: #5a5af1;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'headerUser.php'; ?>
    </header>
    <div class="container">
        <div class="profile-info card">
        <div class="card-header d-flex justify-content-between align-items-center">
                <span>Solicitud de matrícula en línea</span>
                <div>
                <a href="perfil.php" class="btn btn-close btn-sm">Regresar</a>
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
                                        <td>En espera</td>

                                    </tr>
                                    <tr>
                                        <td>Fecha de última actualización</td>
                                        <td>25/02/2024</td>
                                    </tr>
                                    <!-- Agrega más filas aquí según sea necesario -->
                                </tbody>
                            </table>
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
        <?php include 'footerUser.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>