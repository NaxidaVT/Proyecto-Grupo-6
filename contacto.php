<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <?php include 'header-template.php'; ?>
    </header>
    <section id="banner-m"
        style="background-image: url('https://images.pexels.com/photos/5965914/pexels-photo-5965914.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover; background-position: center; position: relative;margin-bottom: 50px;">

        <div class="opacity-layer"></div>

        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5 p-1" style="color: #FFFFFF;">
                        <h2>Contacto Soporte</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <section id="contacto">
            <div class="container p-1">
                <form method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="modal-body p-1">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombreCompletoC" name="nombreCompletoC"
                                        required placeholder="@ejemplo.com">
                                    <label for="nombreCompletoC">Nombre completo</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="correo" name="correoC"
                                        placeholder="@ejemplo.com">
                                    <label for="correoC">Correo electrónico</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="celularC" name="celularC" required
                                        placeholder="8888-8888">
                                    <label for="celularC">Celular</label>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-4">

                            <div class="col">
                                <div class="form-floating">
                                    <textarea class="form-control" id="mensaje" name="mensaje"
                                        placeholder="mensaje" required style="height: 136px;"></textarea>
                                    <label for="mensaje">Mensaje</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-register" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer mt-5 py-3 bg-light text-center">
        <?php include 'footer-template.php'; ?>
    </footer>

    <script src="./js/script.js"></script>
</body>

</html>