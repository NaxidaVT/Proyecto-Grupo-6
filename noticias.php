<?php
require_once './administracion/db_connect.php';

// Función para obtener noticias de la base de datos
function obtenerNoticias($conn) {
    $sql = "SELECT title, date, description FROM announcements ORDER BY date DESC LIMIT 5";
    $result = $conn->query($sql);
    $noticias = [];

    if ($result === false) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noticias[] = [
                "titulo" => $row["title"],
                "fecha" => $row["date"],
                "contenido" => $row["description"]
            ];
        }
    }

    $result->free();  // Liberar memoria asociada con el resultado
    return $noticias;
}

// Obtener noticias para mostrar
$noticias = obtenerNoticias($conn);
$conn->close();  // Cerrar la conexión después de obtener las noticias
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Escolares</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                                if (empty($noticias)) {
                                    echo '<p>No hay noticias disponibles en este momento.</p>';
                                } else {
                                    foreach ($noticias as $articulo) {
                                        echo '<div class="news-article">';
                                        echo '<h4>' . htmlspecialchars($articulo["titulo"]) . '</h4>';
                                        echo '<p class="text-muted"><small>' . htmlspecialchars($articulo["fecha"]) . '</small></p>';
                                        echo '<p>' . htmlspecialchars($articulo["contenido"]) . '</p>';
                                        echo '</div>';
                                    }
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>

</html>