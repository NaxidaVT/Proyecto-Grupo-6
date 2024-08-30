<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connect.php';

if (!isset($_SESSION['id'])) {
    header("Location: logIn-adm.php");
    exit();
}

$id = $_SESSION['id'];

// Procesar actualización del perfil
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateProfile'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $puesto = $_POST['puesto'];

    $sql = "UPDATE Usuarios SET nombre = ?, apellidos = ?, email = ?, telefono = ?, puesto = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $apellidos, $email, $telefono, $puesto, $id);
    $stmt->execute();
    $stmt->close();
}

// Obtener datos del usuario
$sql = "SELECT * FROM Usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$nombre = htmlspecialchars($user["nombre"] ?? '');
$apellidos = htmlspecialchars($user["apellidos"] ?? '');
$email = htmlspecialchars($user["email"] ?? '');
$telefono = htmlspecialchars($user["telefono"] ?? '');
$puesto = htmlspecialchars($user["puesto"] ?? '');
$cedula = htmlspecialchars($user["cedula"] ?? '');
$imagenPerfil = !empty($user["imagenPerfil"]) && file_exists($user["imagenPerfil"]) 
    ? $user["imagenPerfil"] 
    : 'images/default_profile.png';

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleAdmin.css">
    <link rel="stylesheet" href="./styleadm.css">
</head>
<body>
    <header>
        <?php include 'headerAdmin.php'; ?>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <img src="<?php echo htmlspecialchars($imagenPerfil); ?>" alt="Foto de perfil" class="img-fluid rounded-circle mb-3">
                <form id="profileImageForm" enctype="multipart/form-data">
                    <input type="file" id="profileImage" name="profileImage" style="display: none;">
                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('profileImage').click()">Cambiar imagen</button>
                    <button type="submit" class="btn btn-success btn-sm">Subir</button>
                </form>
                <h4>Bienvenido</h4>
                <h4><?php echo $nombre . ' ' . $apellidos; ?></h4>
                <p><strong>Número de Cédula:</strong><br><?php echo $cedula; ?></p>
                <p><strong>E-mail de contacto:</strong><br><?php echo $email; ?></p>
                <p><strong>Teléfono:</strong><br><?php echo $telefono; ?></p>
                <p><strong>Puesto:</strong><br><?php echo $puesto; ?></p>
            </div>

            <div class="col-md-9 col-lg-10 main-content">
                <h1 class="mt-4">Panel de Administrador</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab">Eventos</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h2 class="mt-4">Bienvenido, <?php echo $nombre . ' ' . $apellidos; ?></h2>
                        <p>Esta es tu página de inicio. Aquí puedes ver un resumen de tu actividad reciente.</p>
                        <h3>Próximos eventos</h3>
                        <ul id="upcomingEvents"></ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2 class="mt-4">Tu Perfil</h2>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $puesto; ?>">
                            </div>
                            <button type="submit" name="updateProfile" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                        <h2 class="mt-4">Eventos Administrativos</h2>
                        <div class="calendar-container">
                            <div id="calendar"></div>
                        </div>
                        <button type="button" class="btn btn-primary btn-agregar-evento" data-toggle="modal" data-target="#eventModal">
                            Agregar Evento
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar eventos -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Agregar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="eventTitle">Título del Evento</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Fecha</label>
                            <input type="text" class="form-control" id="eventDate" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDescription">Descripción</label>
                            <textarea class="form-control" id="eventDescription" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="addEvent()">Guardar Evento</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="admscript.js"></script>
</body>
</html>