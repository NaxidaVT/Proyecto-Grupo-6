<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <?php include 'header-template.php'; ?>
    </header>

    <!-- Hero -->
    <div class="hero-section" style="text-align: center; padding: 40px; background-color: #f8f9fa;">
        <h1>Bienvenido al Sistema de Matrícula en Línea!</h1>
        <p>Matrícula abierta para el curso electivo 2025</p>
        <p>Nuestra aplicación facilita la gestión académica y la comunicación entre padres, estudiantes y administradores escolares</p>
        <a class="btn btn-primary" href="#" style="margin-right: 10px;">Matricúlate en línea</a>
        <a class="btn btn-secondary" href="#">Saber más</a>
    </div>

    <!-- Sección de noticias -->
    <div class="container mt-5 news-section" style="padding: 20px;">
        <h2 class="text-center mb-4">Noticias importantes</h2>
        <div class="row">
            <div class="col-md-3" style="padding: 10px;">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Información Importante antes de iniciar clases</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding: 10px;">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Colegios se preparan para inicio de clases</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding: 10px;">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1584697964328-b1e7f63dca95?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Se valoran escuelas de verano para escuelas primarias</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding: 10px;">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1524069290683-0457abfe42c3?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ministerio de cultura invierte en educación pública</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Calendario -->
    <div class="calendar-section text-center" style="background-color: #5b5f7f; padding: 40px; color: white;">
        <h2>Calendario Escolar 2024-2025</h2>
        <p>¡Planifica tu año escolar con antelación!</p>
        <p>Explora las fechas clave, vacaciones, eventos importantes y más.</p>
        <a class="btn btn-warning" href="#">Ver Calendario</a>
    </div>

    <!-- Sección de documentos importantes -->
    <div class="container important-documents-section" style="padding: 20px;">
        <div class="row">
            <div class="col-md-6" style="padding: 10px;">
                <img src="https://images.unsplash.com/photo-1697382608813-df6eb720164f?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid" alt="...">
            </div>
            <div class="col-md-6" style="padding: 10px;">
                <h2>Documentos importantes</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <a class="btn btn-primary" href="#">Ver Artículo</a>
            </div>
        </div>
    </div>

    <footer style="text-align: center; padding: 20px;">
        <?php include 'footer-template.php'; ?>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
