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
        style="background-image: url('https://images.pexels.com/photos/8965129/pexels-photo-8965129.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover; background-position: center; position: relative;margin-bottom: 50px;">

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
            <h1>Información Médica</h1>
        </div>
        <section id="matricula">
            <div class="container p-1">
                <form method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="modal-body p-1">
                        <div class="row mb-4">
                            <div class="form-floating">
                                <input type="texto" class="form-control" id="alergias" name="alergias"
                                    placeholder="Alergias">
                                <label for="alergias">Alergias conocidas</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-floating">
                                <input type="texto" class="form-control" id="condiciones" name="condiciones"
                                    placeholder="Condiciones médicas preexistentes">
                                <label for="condiciones">Condiciones médicas preexistentes</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="form-floating">
                                <input type="texto" class="form-control" id="medicamentos" name="medicamentos"
                                    placeholder="Medicamentos que el estudiante toma regularmente">
                                <label for="medicamentos">Medicamentos que el estudiante toma regularmente</label>
                            </div>
                        </div>
                        <div class="row mb-4" style="margin-left: 2px; margin-right: 0px;">
                            <label for="poliza" class="form-label">Poliza estudiantil </label>
                            <input type="file" class="form-control" id="poliza" name="poliza" required>
                        </div>
                    </div>
                    <div class="container p-1" style="margin-bottom: 24px;">
                        <div class="row">
                            <div class="col-md-9">
                            </div>
                        </div>
                        <div class="text-center mt-3 p-1">
                            <h1>Autorizaciones y Consentimientos</h1>
                        </div>
                    </div>
                    <div style="margin-bottom: 24px;">
                        <input class="form-check-input" type="checkbox" name="permisoEmergencia"
                            id="permisoEmergencia" />
                        <label for="permisoEmergencia">Permiso para tratar al estudiante en caso de emergencia
                            médica</label>
                    </div>
                    <div style="margin-bottom: 24px;">
                        <input class="form-check-input" type="checkbox" name="permisoFoto" id="permisoFoto" />
                        <label for="permisoFoto">Consentimiento para tomar y usar fotografías del estudiante para
                            actividades escolares</label>
                    </div>
                    <div style="margin-bottom: 24px;">
                        <input class="form-check-input" type="checkbox" name="permisoExcursiones"
                            id="permisoExcursiones" />
                        <label for="permisoExcursiones">Autorización para que el estudiante participe en excursiones
                            escolares y otras actividades fuera de la escuela</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-register" type="submit" >Enviar</button>
                    </div>
            </div>
            </form>
            </div>
        </section>
    </main>
    <footer>
        <?php include 'footer-template.php'; ?>
    </footer>
</body>

</html>