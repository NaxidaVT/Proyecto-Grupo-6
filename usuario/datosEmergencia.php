<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleUser.css">
</head>

<body>
    <header>
        <?php include 'headerUser.php'; ?>
    </header>
    <section id="banner-m"
        style="background-image: url('https://estaticos-cdn.prensaiberica.es/clip/27162208-425c-4c71-b6df-5e016ede2ea7_21-9-aspect-ratio_default_0.jpg'); background-size: cover; background-position: center; position: relative;margin-bottom: 50px;">
        <div class="opacity-layer"></div>
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5 p-1" style="color: #FFFFFF;">
                        <h2>Matrícula</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="text-center mt-3 p-1">
            <h1>Datos de emergencia</h1>
        </div>
        <section id="datosEmergencia">
            <div class="container p-1">
                <form method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="modal-body p-1">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombreCompletoE" name="nombreCompletoE"
                                        required placeholder="@ejemplo.com">
                                    <label for="nombreCompletoE">Nombre completo del encargado</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cedulaE" name="cedulaE" required
                                        placeholder="8888-8888">
                                    <label for="cedulaE">No. de Identificación</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="parentesco" class="form-control" id="parentesco" name="parentesco"
                                        required placeholder="@ejemplo.com">
                                    <label for="parentesco">Parentesco</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="celularE" name="celularE" required
                                        placeholder="8888-8888">
                                    <label for="celularE">Celular</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="correoE" name="correoE" required
                                        placeholder="@ejemplo.com">
                                    <label for="correo">Correo electrónico</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">

                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control" id="direccionE" name="direccionE"
                                        placeholder="direccionE" required style="height: 136px;"></textarea>
                                    <label for="direccionE">Dirección de residencia</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="actualmenteT" name="actualmenteT" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="primero">Si</option>
                                        <option value="segundo">No</option>
                                    </select>
                                    <label for="actualmenteT">Trabaja actualmente</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="texto" class="form-control" id="lugarT" name="lugarT"
                                        placeholder="Lugar de Trabajo">
                                    <label for="lugarT">Lugar de Trabajo</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="lugarT" name="telefonoT"
                                        placeholder="Teléfono trabajo">
                                    <label for="telefonoT">Teléfono trabajo</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-register" type="submit" formaction="otros.php">Siguente</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <?php include 'footerUser.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>