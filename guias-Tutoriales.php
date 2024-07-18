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
        style="background-image: url('https://images.pexels.com/photos/5699475/pexels-photo-5699475.jpeg?auto=compress&cs=tinysrgb&w=600'); background-size: cover; background-position: center; position: relative;margin-bottom: 50px;">
        <div class="opacity-layer"></div>
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5 p-1" style="color: #FFFFFF;">
                        <h2>Guias y Tutoriales</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>

        <section id="guia">
            <div class="text-center mt-3 p-1">
                <h1>Guias</h1>
            </div>
            <div class="container p-1">

                <div class="card-custom-guia mb-3">
                    <img src="https://images.pexels.com/photos/6207367/pexels-photo-6207367.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Fases de la matricula</h5>
                        <p class="card-text">A continuación, te presentamos un resumen de todas las fases del proceso de
                            matrícula para que puedas seguir cada paso con facilidad.</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-register" type="submit">Descargar</button>
                        </div>
                    </div>
                </div>

        </section>

        <section id="guia">
            <div class="text-center mt-3 p-1">
                <h1>Tutoriales</h1>
            </div>
            <div class="container p-1">

                <div class="card-custom-guia mb-3">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ed5I0tZE4n0?si=0Sm71oYzrWXcDlL7"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Tutorial</h5>
                        <p class="card-text">Se guiará paso a paso en caso de que el equipo de soporte te indique que
                            debes realizar estos pasos. Este tutorial te permitirá brindar una mejor asistencia y
                            resolver cualquier problema de manera más eficaz.</p>
                    </div>

        </section>

    </main>
    <footer>
        <?php include 'footer-template.php'; ?>
    </footer>
</body>

</html>