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
    <?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'sist_mat';
$username = 'root';
$password = ''; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT notification_id, nombre, mensaje, telefono, email FROM notifications ORDER BY notification_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["nombre"] . "</h5>";
        echo "<h6 class='card-subtitle mb-2 text-muted'>" . $row["email"] . " | " . $row["telefono"] . "</h6>";
        echo "<p class='card-text'>" . $row["mensaje"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No hay notificaciones";
}

$conn->close();
?>

    <script>
        function showEmail(emailId) {
            const emails = {
                email1: {
                    subject: 'Recordatorio: Reunión de Padres el 15 de marzo',
                    body: 'Estimados padres, les recordamos que la reunión de padres se llevará a cabo el 15 de marzo a las 10:00 AM en el auditorio de la escuela...',
                    attachments: []
                },
                email2: {
                    subject: 'Boletín Informativo de Febrero',
                    body: 'Queridos padres, en el boletín de este mes encontrarán información sobre los próximos eventos, actividades y noticias de la escuela...',
                    attachments: []
                },
                email3: {
                    subject: 'Actualización de la Política de Asistencia',
                    body: 'Apreciados padres, queremos informarles sobre una actualización en nuestra política de asistencia para garantizar un mejor seguimiento y apoyo a los estudiantes...',
                    attachments: []
                },
                email4: {
                    subject: 'Evento de Fin de Año',
                    body: 'Estimados padres, los invitamos cordialmente a nuestro evento de fin de año que se celebrará el 20 de diciembre. Habrá presentaciones de los estudiantes, premios y más...',
                    attachments: []
                },
                email5: {
                    subject: 'Invitación: Taller para Padres',
                    body: 'Queridos padres, estamos organizando un taller especial para padres el 25 de noviembre. El tema será "Apoyo educativo en el hogar" y esperamos contar con su asistencia...',
                    attachments: []
                },
                email6: {
                    subject: 'Recordatorio: Entrega de Boletas de Calificaciones',
                    body: 'Estimados padres, les recordamos que la entrega de boletas de calificaciones se realizará el 15 de noviembre. Por favor, asegúrense de recoger las boletas en la oficina principal...',
                    attachments: []
                },
                email7: {
                    subject: 'Actualización de Contacto de Emergencia',
                    body: 'Queridos padres, les solicitamos actualizar la información de contacto de emergencia para sus hijos. Es crucial que tengamos los datos correctos en caso de cualquier emergencia...',
                    attachments: []
                },
            };

            const email = emails[emailId];
            let attachmentHTML = '';

            email.attachments.forEach(attachment => {
                attachmentHTML += `<div class="attachment"><img src="${attachment}" alt="Attachment"></div>`;
            });

            document.getElementById('email-detail').innerHTML = `
                <h3>${email.subject}</h3>
                <p>${email.body}</p>
                ${attachmentHTML}
                <button class="btn btn-danger delete-btn">Eliminar Correo</button>
            `;
        }
    </script>

    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>