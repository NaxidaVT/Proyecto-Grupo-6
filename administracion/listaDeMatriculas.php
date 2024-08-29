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
    <div class="d-flex justify-content-center align-items-center">
        
        <div class="content col-md-10">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h2>Ver Matrículas</h2>
                    <button class="btn btn-danger">Denegar Matrículas</button>
                    <button class="btn btn-success">Aceptar Matrícula</button>
                </div>
                <div class="search-bar-container">
                    <input class="form-control search-bar" id="busquedadCedula" type="text"
                        placeholder="Buscar por cédula">
                    <button class="btn btn-search">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox">
                                Matrícula ID: <a href="#" onclick="toggleDetails('details1')">#6709</a>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Estudiante:</strong> Maria Gonzales</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Cédula:</strong> 1-1111-1111</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Año a cursar:</strong> 6 grado</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Fecha de creación:</strong> 08/11/2021</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Destino:</strong> 3</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Estado:</strong> <span class="status-pending">Pendiente</span></p>
                                </div>
                            </div>
                        </div>
                        <div id="details1" class="details-row card-body border-top">
                            <div class="d-flex">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Programación Avanzada</p>
                                    <p class="mb-1">Código: PR-756760</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Introducción a la Programación</p>
                                    <p class="mb-1">Código: PR-765432</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repite este patrón para más filas -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox">
                                Matrícula ID: <a href="#" onclick="toggleDetails('details1')">#6709</a>
                            </div>
                            <a href="solicitudVistaCompleta.php" class="btn btn-view btn-sm">Ver detalles de solicitud</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Estudiante:</strong> Maria Gonzales</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Cédula:</strong> 1-1111-1111</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Año a cursar:</strong> 6 grado</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Fecha de creación:</strong> 08/11/2021</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Destino:</strong> 3</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Estado:</strong> <span class="status-pending">Pendiente</span></p>
                                </div>
                            </div>
                        </div>
                        <div id="details1" class="details-row card-body border-top">
                            <div class="d-flex">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Programación Avanzada</p>
                                    <p class="mb-1">Código: PR-756760</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Introducción a la Programación</p>
                                    <p class="mb-1">Código: PR-765432</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repite este patrón para más filas -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox">
                                Matrícula ID: <a href="#" onclick="toggleDetails('details1')">#6709</a>
                            </div>
                            <a href="solicitudVistaCompleta.php" class="btn btn-view btn-sm">Ver detalles de solicitud</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Estudiante:</strong> Maria Gonzales</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Cédula:</strong> 1-1111-1111</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Año a cursar:</strong> 6 grado</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Fecha de creación:</strong> 08/11/2021</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Destino:</strong> 3</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Estado:</strong> <span class="status-pending">Pendiente</span></p>
                                </div>
                            </div>
                        </div>
                        <div id="details1" class="details-row card-body border-top">
                            <div class="d-flex">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Programación Avanzada</p>
                                    <p class="mb-1">Código: PR-756760</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div><img src="https://via.placeholder.com/50" alt="Producto"></div>
                                <div class="ml-3">
                                    <p class="mb-1">Curso de Introducción a la Programación</p>
                                    <p class="mb-1">Código: PR-765432</p>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-view">Ver Matrícula</button>
                                </div>
                            </div>
                        </div>
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