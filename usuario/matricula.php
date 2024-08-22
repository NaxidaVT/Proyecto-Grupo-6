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
        style="background-image: url('https://images.pexels.com/photos/8457722/pexels-photo-8457722.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover; background-position: center; position: relative;margin-bottom: 50px;">
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
        <section id="matricula">
            <div class="container p-1">
                <form method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="modal-body p-1">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto"
                                        required placeholder="@ejemplo.com">
                                    <label for="nombreCompleto">Nombre completo del estudiante</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                                        required>
                                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="genero" name="genero" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <label for="genero">Género</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control" id="direccion" name="direccion"
                                        placeholder="direccion" required style="height: 136px;"></textarea>
                                    <label for="direccion">Dirección de residencia</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="telcel" name="telcel" required
                                        placeholder="8888-8888">
                                    <label for="telcel">Teléfono/celular del encargado</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="correo" name="correo" required
                                        placeholder="@ejemplo.com">
                                    <label for="correo">Correo electrónico del encargado</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="grado" name="grado" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="primero">Primero</option>
                                        <option value="segundo">Segundo</option>
                                        <option value="tercero">Tercero</option>
                                        <option value="cuarto">Cuarto</option>
                                        <option value="quinto">Quinto</option>
                                        <option value="sexto">Sexto</option>
                                    </select>
                                    <label for="grado">Grado</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="historialAcademico" class="form-label">Historial académico</label>
                                <input type="file" class="form-control" id="historialAcademico"
                                    name="historialAcademico" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="fotoCopiaCedula" class="form-label">Fotocopia de la cédula </label>
                                <input type="file" class="form-control" id="fotoCopiaCedula" name="fotoCopiaCedula"
                                    required>
                            </div>
                            <div class="col">
                                <label for="certificadoNacimiento" class="form-label">Certificado de nacimiento </label>
                                <input type="file" class="form-control" id="certificadoNacimiento"
                                    name="certificadoNacimiento" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-register" type="submit"
                                formaction="datosEmergencia.php">Siguente</button>
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