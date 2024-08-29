<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sist_mat";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para agregar un perfil
function addProfile($nombre, $apellidos, $cedula, $correo, $telefono, $estudiantes) {
    global $conn;

    try {
        // Guardar el perfil del padre
        $sql = "INSERT INTO parents (cedula, first_name, last_name, email, phone_number, password, role) 
                VALUES (?, ?, ?, ?, ?, 'hashed_password', 'user')";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }
        $stmt->bind_param("sssss", $cedula, $nombre, $apellidos, $correo, $telefono);
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
        $parent_id = $conn->insert_id;

        // Guardar los estudiantes
        if (!empty($estudiantes)) {
            foreach ($estudiantes as $estudiante) {
                $cedulaEstudiante = $estudiante['cedula'];
                $nombreEstudiante = $estudiante['nombre'];
                $apellidosEstudiante = $estudiante['apellidos'];

                $sqlEstudiante = "INSERT INTO students (cedula, first_name, last_name, parent_id) 
                                  VALUES (?, ?, ?, ?)";
                $stmtEstudiante = $conn->prepare($sqlEstudiante);
                if (!$stmtEstudiante) {
                    throw new Exception("Error en la preparación de la consulta de estudiante: " . $conn->error);
                }
                $stmtEstudiante->bind_param("sssi", $cedulaEstudiante, $nombreEstudiante, $apellidosEstudiante, $parent_id);
                if (!$stmtEstudiante->execute()) {
                    throw new Exception("Error al ejecutar la consulta de estudiante: " . $stmtEstudiante->error);
                }
            }
        }

        return $parent_id;
    } catch (Exception $e) {
        error_log("Error en addProfile: " . $e->getMessage());
        throw $e;
    }
}

// Función para obtener los datos de un perfil
function getProfile($profileId) {
    global $conn;

    // Cargar datos del perfil
    $sql = "SELECT * FROM parents WHERE parent_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $profileId);
    $stmt->execute();
    $result = $stmt->get_result();
    $parent = $result->fetch_assoc();

    // Cargar estudiantes asociados
    $sqlEstudiantes = "SELECT * FROM students WHERE parent_id = ?";
    $stmtEstudiantes = $conn->prepare($sqlEstudiantes);
    $stmtEstudiantes->bind_param("i", $profileId);
    $stmtEstudiantes->execute();
    $resultEstudiantes = $stmtEstudiantes->get_result();
    $estudiantes = [];

    while ($row = $resultEstudiantes->fetch_assoc()) {
        $estudiantes[] = $row;
    }

    return [
        'nombre' => $parent['first_name'],
        'apellidos' => $parent['last_name'],
        'cedula' => $parent['cedula'],
        'correo' => $parent['email'],
        'telefono' => $parent['phone_number'],
        'estudiantes' => $estudiantes
    ];
}

// Función para editar un perfil
function editProfile($profileId, $nombre, $apellidos, $cedula, $correo, $telefono, $estudiantes) {
    global $conn;

    // Actualizar el perfil del padre
    $sql = "UPDATE parents SET cedula=?, first_name=?, last_name=?, 
            email=?, phone_number=? WHERE parent_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $cedula, $nombre, $apellidos, $correo, $telefono, $profileId);
    $stmt->execute();

    // Actualizar los estudiantes
    foreach ($estudiantes as $estudiante) {
        $cedulaEstudiante = $estudiante['cedula'];
        $nombreEstudiante = $estudiante['nombre'];
        $apellidosEstudiante = $estudiante['apellidos'];
        $studentId = $estudiante['student_id'];

        $sqlEstudiante = "UPDATE students SET cedula=?, first_name=?, 
                          last_name=? WHERE student_id=?";
        $stmtEstudiante = $conn->prepare($sqlEstudiante);
        $stmtEstudiante->bind_param("sssi", $cedulaEstudiante, $nombreEstudiante, $apellidosEstudiante, $studentId);
        $stmtEstudiante->execute();
    }
}

// Manejar solicitudes POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $profileId = isset($_POST['profile_id']) ? $_POST['profile_id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $estudiantes = isset($_POST['estudiantes']) ? json_decode($_POST['estudiantes'], true) : [];

    if ($action === 'add') {
        try {
            $newProfileId = addProfile($nombre, $apellidos, $cedula, $correo, $telefono, $estudiantes);
            echo json_encode(['status' => 'success', 'message' => 'Perfil agregado con éxito', 'newProfileId' => $newProfileId]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
        exit;
    } elseif ($action === 'edit') {
        editProfile($profileId, $nombre, $apellidos, $cedula, $correo, $telefono, $estudiantes);
        echo json_encode(['status' => 'success']);
        exit;
    } elseif ($action === 'delete') {
        // Eliminar estudiantes asociados primero
        $sqlDeleteStudents = "DELETE FROM students WHERE parent_id = ?";
        $stmtDeleteStudents = $conn->prepare($sqlDeleteStudents);
        $stmtDeleteStudents->bind_param("i", $profileId);
        $stmtDeleteStudents->execute();

        // Luego eliminar el perfil del padre
        $sqlDeleteParent = "DELETE FROM parents WHERE parent_id = ?";
        $stmtDeleteParent = $conn->prepare($sqlDeleteParent);
        $stmtDeleteParent->bind_param("i", $profileId);
        if ($stmtDeleteParent->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el perfil']);
        }
        exit;
    }
}

// Manejar solicitudes GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $profileId = $_GET['id'];
    $profileData = getProfile($profileId);
    echo json_encode($profileData);
    exit;
}

include 'headerAdmin.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleAdmin.css">
</head>

<body>
    <div class="container">
        <h1>Administrar Perfiles</h1>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#profileModal">Agregar Perfil</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="profilesTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM parents";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['first_name']} {$row['last_name']}</td>
                                    <td>{$row['cedula']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone_number']}</td>
                                    <td>
                                        <button class='btn btn-sm btn-primary edit-profile' data-id='{$row['parent_id']}'>Editar</button>
                                        <button class='btn btn-sm btn-danger delete-profile' data-id='{$row['parent_id']}'>Eliminar</button>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron perfiles</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal para agregar/editar perfil -->
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Agregar/Editar Perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="profileForm">
                            <input type="hidden" id="profile_id" name="profile_id" value="">
                            <input type="hidden" id="action" name="action" value="add">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div id="studentsContainer"></div>
                            <button type="button" class="btn btn-secondary" id="addStudent">Agregar Estudiante</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="saveProfile">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./scriptAdmin.js"></script>

</body>
</html>