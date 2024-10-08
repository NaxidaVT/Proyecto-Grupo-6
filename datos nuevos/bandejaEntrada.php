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
    <div class="d-flex">
        <div class="sidebar col-md-2">
            <a href="#" class="text-center mb-4 d-block">Correo</a>
            <a href="#" class="rounded">Bandeja de entrada <span
                    class="badge badge-secondary float-right rounded">7</span></a>
        </div>
        <div class="email-list col-md-4">
            <div class="email-item" onclick="showEmail('email1')">
                <strong>Escuela Primaria ABC</strong>
                <p>Recordatorio: Reunión de Padres el 15 de marzo...</p>
                <small>10:00 AM</small>
            </div>
            <div class="email-item" onclick="showEmail('email2')">
                <strong>Escuela Primaria ABC</strong>
                <p>Boletín Informativo de Febrero...</p>
                <small>Feb 10</small>
            </div>
            <div class="email-item" onclick="showEmail('email3')">
                <strong>Escuela Primaria ABC</strong>
                <p>Actualización de la Política de Asistencia...</p>
                <small>Jan 28</small>
            </div>
            <div class="email-item" onclick="showEmail('email4')">
                <strong>Escuela Primaria ABC</strong>
                <p>Evento de Fin de Año...</p>
                <small>Dec 20</small>
            </div>
            <div class="email-item" onclick="showEmail('email5')">
                <strong>Escuela Primaria ABC</strong>
                <p>Invitación: Taller para Padres...</p>
                <small>Nov 25</small>
            </div>
            <div class="email-item" onclick="showEmail('email6')">
                <strong>Escuela Primaria ABC</strong>
                <p>Recordatorio: Entrega de Boletas de Calificaciones...</p>
                <small>Nov 15</small>
            </div>
            <div class="email-item" onclick="showEmail('email7')">
                <strong>Escuela Primaria ABC</strong>
                <p>Actualización de Contacto de Emergencia...</p>
                <small>Nov 5</small>
            </div>
        </div>
        <div class="email-detail col-md-6" id="email-detail">
            <h3>Haz Click en un correo para ver sus contenido</h3>
        </div>
    </div>
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