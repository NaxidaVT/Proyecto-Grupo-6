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
                                    <tr>
                                        <td>Nueva Fecha de Inscripción</td>
                                        <td>2024-07-20</td>
                                        <td>La nueva fecha de inscripción es el 20 de julio de 2024. Asegúrese de
                                            completar su formulario antes de la fecha límite.</td>
                                        <td>
                                            <button class="btn btn-warning btn-edit mt-1 mb-1" data-toggle="modal"
                                                data-target="#announcementModal" data-id="1">
                                                <i class="fas fa-pencil-alt" style="color: white;"></i>
                                            </button>
                                            <button class="btn btn-danger mt-1 mb-1">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo"
                                    placeholder="Ingresa el título del anuncio">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" rows="3"
                                    placeholder="Ingresa la descripción del anuncio"></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-add" id="saveProfile">Guardar</button>
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