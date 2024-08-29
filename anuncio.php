<?php
require_once 'db_connect.php';

// Definir las variables de conexión si no están definidas
if (!isset($host)) {
    $host = 'localhost';
    $dbname = 'sist_mat';
    $username = 'root';
    $password = '';
}

// Intentar establecer la conexión si $conn no está definida
if (!isset($conn)) {
    try {
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            throw new Exception("Error de conexión: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
    } catch (Exception $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea - Anuncios</title>
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
                <span>Listado de Anuncios</span>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <button class="btn btn-add" data-toggle="modal" data-target="#announcementModal">
                            <i class="fas fa-plus"></i>
                        </button>
                        <span>Tabla de Anuncios</span>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="announcementsTable">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los anuncios se cargarán aquí dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog"
            aria-labelledby="announcementModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="announcementModalLabel">Agregar/Editar Anuncio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="announcementForm">
                            <input type="hidden" id="announcement_id" name="id">
                            <input type="hidden" id="action" name="action" value="add">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="saveAnnouncement">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="anuncio.js"></script>
</body>

</html>