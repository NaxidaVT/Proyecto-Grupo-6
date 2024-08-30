<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'db_connect.php';

// Verificar si se proporcionó un ID de matrícula
//if (!isset($_GET['enrollment_id']) || empty($_GET['enrollment_id'])) {
   //}

//$enrollment_id = $_GET['enrollment_id'];

// Obtener datos del usuario admin
if(isset($_SESSION['3'])) {
    $id = $_SESSION['3'];
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if($user) {
        $nombre = htmlspecialchars($user["nombre"] ?? '');
        $apellidos = htmlspecialchars($user["apellidos"] ?? '');
        $email = htmlspecialchars($user["email"] ?? '');
        $telefono = htmlspecialchars($user["telefono"] ?? '');
        $puesto = htmlspecialchars($user["puesto"] ?? '');
        $cedula = htmlspecialchars($user["cedula"] ?? '');
        $imagenPerfil = 'perfil_adm/' . $user["imagenPerfil"];
    } else {
        // Manejar el caso en que no se encuentre el usuario
        $nombre = $apellidos = $email = $telefono = $puesto = $cedula = '';
        $imagenPerfil = 'perfil_adm/default_profile.png';
    }
} else {
    // Manejar el caso en que no haya una sesión de usuario iniciada
    $nombre = $apellidos = $email = $telefono = $puesto = $cedula = '';
    $imagenPerfil = 'perfil_adm/default_profile.png';
}

// Consulta para obtener los detalles de la matrícula seleccionada
$sql = "SELECT e.enrollment_id, e.enrollment_date, e.year_to_course, e.status, 
               p.first_name AS parent_first_name, p.last_name AS parent_last_name, p.cedula AS parent_cedula,
               s.first_name AS student_first_name, s.last_name AS student_last_name, s.cedula AS student_cedula
        FROM enrollments e
        LEFT JOIN parents p ON e.parent_id = p.parent_id
        LEFT JOIN students s ON e.student_id = s.student_id
        WHERE e.enrollment_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $enrollment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $enrollment = $result->fetch_assoc();
} else {
    echo "No se encontró la matrícula solicitada.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Matrícula</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleAdmin.css">
</head>
<body>
    <header>
        <?php include 'headerAdmin.php'; ?>
    </header>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <img src="<?php echo htmlspecialchars($imagenPerfil); ?>" alt="Foto de perfil" class="img-fluid rounded-circle mb-3">
                <h4>Bienvenido</h4>
                <h4><?php echo $nombre . ' ' . $apellidos; ?></h4>
                <p><strong>Número de Cédula:</strong><br><?php echo $cedula; ?></p>
                <p><strong>E-mail de contacto:</strong><br><?php echo $email; ?></p>
                <p><strong>Teléfono:</strong><br><?php echo $telefono; ?></p>
                <p><strong>Puesto:</strong><br><?php echo $puesto; ?></p>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <h2>Detalle de Matrícula #<?php echo $enrollment['enrollment_id']; ?></h2>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Información de la Matrícula</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Estudiante:</strong> <?php echo htmlspecialchars($enrollment['student_first_name'] . ' ' . $enrollment['student_last_name']); ?></p>
                                <p><strong>Cédula del Estudiante:</strong> <?php echo htmlspecialchars($enrollment['student_cedula']); ?></p>
                                <p><strong>Año a cursar:</strong> <?php echo htmlspecialchars($enrollment['year_to_course']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Padre/Madre:</strong> <?php echo htmlspecialchars($enrollment['parent_first_name'] . ' ' . $enrollment['parent_last_name']); ?></p>
                                <p><strong>Cédula del Padre/Madre:</strong> <?php echo htmlspecialchars($enrollment['parent_cedula']); ?></p>
                                <p><strong>Fecha de matrícula:</strong> <?php echo htmlspecialchars($enrollment['enrollment_date']); ?></p>
                                <p><strong>Estado:</strong> <span class="status-<?php echo strtolower($enrollment['status']); ?>"><?php echo ucfirst($enrollment['status']); ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="listaDeMatriculas.php" class="btn btn-secondary">Volver a la lista de matrículas</a>
                    <button class="btn btn-primary">Editar Matrícula</button>
                    <button class="btn btn-success">Aprobar Matrícula</button>
                    <button class="btn btn-danger">Rechazar Matrícula</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>