<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Escolares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        #banner-noticias {
            background-image: url('https://c.wallhere.com/photos/fd/43/students_fingers_class_globe_books_white_background-1031810.jpg!d');
            background-size: cover;
            background-position: center;
            position: relative;
            margin-bottom: 50px;
        }
        .opacity-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .news-header {
            color: #FFFFFF;
            padding: 60px 0;
        }
        .news-container {
            margin-top: 30px;
        }
        .news-article {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'header-template.php'; ?>
    </header>

    <section id="banner-noticias">
        <div class="opacity-layer"></div>
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mt-5 p-1 news-header">
                        <h2>Noticias Escolares</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section id="noticias">
            <div class="container news-container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Datos de ejemplo para las noticias escolares
                                $noticias = [
                                    [
                                        "titulo" => "Nueva Fecha de Inscripción",
                                        "fecha" => "2024-07-20",
                                        "contenido" => "La nueva fecha de inscripción es el 20 de julio de 2024. Asegúrese de completar su formulario antes de la fecha límite."
                                    ],
                                    [
                                        "titulo" => "Actualización de Protocolos COVID-19",
                                        "fecha" => "2024-07-15",
                                        "contenido" => "Se han actualizado los protocolos de COVID-19. Por favor, revise los nuevos lineamientos en el sitio web."
                                    ],
                                    [
                                        "titulo" => "Feria de Ciencias 2024",
                                        "fecha" => "2024-07-10",
                                        "contenido" => "La Feria de Ciencias se llevará a cabo el 10 de julio de 2024. Todos los estudiantes están invitados a participar."
                                    ],
                                ];

                                foreach ($noticias as $articulo) {
                                    echo '<div class="news-article">';
                                    echo '<h4>' . htmlspecialchars($articulo["titulo"]) . '</h4>';
                                    echo '<p class="text-muted"><small>' . htmlspecialchars($articulo["fecha"]) . '</small></p>';
                                    echo '<p>' . htmlspecialchars($articulo["contenido"]) . '</p>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include 'footer-template.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>