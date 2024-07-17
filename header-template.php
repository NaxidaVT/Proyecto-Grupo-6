<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header" style="padding: 20px 0; font-size: 20px;">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
            <a href="#" class="navbar-brand">
                        <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSSkYth4kp2yJNZUVHGLwAzwSlNWu9pXEi6Tg_KUJMyvnfkQWZr" />
                        Nombre
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="#">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Escuelas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Noticias</a></li>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false">Soporte</a>
                                <ul class="dropdown-menu dropdown-menu-white">
                                    <li class="nav-item"><a class="nav-link" href="#">FaQ</a></li>
                                    header-template <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Guias</a></li>
                                </ul>
                            </li>
                        </ul>
                        <li class="nav-item"><a class="btn btn-custom" href="#">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="btn btn-register" href="#">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</body>