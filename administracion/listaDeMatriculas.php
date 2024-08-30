<?php
require_once 'db_connect.php';

// Función para obtener las matrículas de la base de datos
function obtenerMatriculas($conn) {
    $sql = "SELECT e.enrollment_id, e.enrollment_date, e.year_to_course, e.status, 
                   p.first_name AS parent_first_name, p.last_name AS parent_last_name, p.cedula AS parent_cedula,
                   s.first_name AS student_first_name, s.last_name AS student_last_name, s.cedula AS student_cedula
            FROM enrollments e
            LEFT JOIN parents p ON e.parent_id = p.parent_id
            LEFT JOIN students s ON e.student_id = s.student_id
            ORDER BY e.enrollment_date DESC";
    
    $result = $conn->query($sql);
    $matriculas = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $matriculas[] = $row;
        }
    }
    return $matriculas;
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parent_cedula = $_POST['parent_cedula'];
    $student_cedula = $_POST['student_cedula'];
    $year_to_course = $_POST['year_to_course'];
    $enrollment_date = date('Y-m-d'); // Fecha actual

    // Obtener parent_id y student_id basados en las cédulas
    $sql_parent = "SELECT parent_id FROM parents WHERE cedula = ?";
    $stmt_parent = $conn->prepare($sql_parent);
    $stmt_parent->bind_param("s", $parent_cedula);
    $stmt_parent->execute();
    $result_parent = $stmt_parent->get_result();
    $parent_id = $result_parent->fetch_assoc()['parent_id'];

    $sql_student = "SELECT student_id FROM students WHERE cedula = ?";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("s", $student_cedula);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();
    $student_id = $result_student->fetch_assoc()['student_id'];

    // Insertar nueva matrícula
    $sql_insert = "INSERT INTO enrollments (parent_id, student_id, enrollment_date, year_to_course, status) VALUES (?, ?, ?, ?, 'pendiente')";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iiss", $parent_id, $student_id, $enrollment_date, $year_to_course);
    
    if ($stmt_insert->execute()) {
        $mensaje = "Matrícula añadida con éxito.";
    } else {
        $mensaje = "Error al añadir la matrícula: " . $conn->error;
    }
}

// Obtener datos del usuario admin
session_start(); // Asegúrate de iniciar la sesión si no lo has hecho ya

if(isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
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

// Obtener matrículas
$matriculas = obtenerMatriculas($conn);

// Cerrar la conexión después de todas las operaciones
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
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
            <div class="content col-md-10">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h2>Ver Matrículas</h2>
                        <button class="btn btn-danger">Denegar Matrículas</button>
                        <button class="btn btn-success">Aceptar Matrícula</button>
                    </div>
                    <div class="search-bar-container">
                        <input class="form-control search-bar" id="busquedadCedula" type="text"
                            placeholder="Buscar por cédula">
                        <button class="btn btn-search">Buscar</button>
                    </div>
                </div>

                <!-- Lista de matrículas -->
                <div class="row">
                    <?php foreach ($matriculas as $matricula): ?>
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox">
                                    Matrícula ID: <a href="#" onclick="toggleDetails('details<?php echo $matricula['enrollment_id']; ?>')">#<?php echo $matricula['enrollment_id']; ?></a>
                                </div>
                                <a href="solicitudVistaCompleta.php?id=<?php echo $matricula['enrollment_id']; ?>" class="btn btn-view btn-sm">Ver detalles de solicitud</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Estudiante:</strong> <?php echo htmlspecialchars($matricula['student_first_name'] . ' ' . $matricula['student_last_name']); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Cédula:</strong> <?php echo htmlspecialchars($matricula['student_cedula']); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Año a cursar:</strong> <?php echo htmlspecialchars($matricula['year_to_course']); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Fecha de creación:</strong> <?php echo htmlspecialchars($matricula['enrollment_date']); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Estado:</strong> <span class="status-<?php echo strtolower($matricula['status']); ?>"><?php echo ucfirst($matricula['status']); ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div id="details<?php echo $matricula['enrollment_id']; ?>" class="details-row card-body border-top" style="display: none;">
                                <div class="d-flex">
                                    <div class="ml-3">
                                        <p class="mb-1">Información adicional de la matrícula</p>
                                        <p class="mb-1">Padre/Madre: <?php echo htmlspecialchars($matricula['parent_first_name'] . ' ' . $matricula['parent_last_name']); ?></p>
                                        <p class="mb-1">Cédula del Padre/Madre: <?php echo htmlspecialchars($matricula['parent_cedula']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['student_first_name'] . " " . $row['student_last_name'] . "</td>";
    echo "<td>" . $row['enrollment_date'] . "</td>";
    echo "<td>" . $row['year_to_course'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td><a href='solicitudVistaCompleta.php?enrollment_id=" . $row['enrollment_id'] . "' class='btn btn-primary'>Ver detalle de solicitud</a></td>";
    echo "</tr>";
}
?>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleDetails(id) {
            var details = document.getElementById(id);
            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }
        }
    </script>
</body>

</html>