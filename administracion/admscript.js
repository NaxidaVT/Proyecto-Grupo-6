let selectedDate = '';
let currentUserName = '';

document.addEventListener('DOMContentLoaded', function() {
    initializeCalendar();
    getCurrentUserName();
    initializeEventListeners();
    loadUpcomingEvents();

    const profileImageForm = document.getElementById('profileImageForm');
    if (profileImageForm) {
        profileImageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            uploadProfileImage();
        });
    }
});

function initializeCalendar() {
    var calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día'
            },
            locale: 'es',
            height: 'auto',
            contentHeight: 600,
            aspectRatio: 1.8,
            initialDate: new Date(), // Establece la fecha inicial al día actual
            events: function(info, successCallback, failureCallback) {
                // ... código para cargar eventos ...
            },
            selectable: true,
            select: function(info) {
                // ... código para manejar la selección ...
            }
        });
        calendar.render();

        // Asegúrate de que la pestaña de eventos esté activa al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            var eventosTab = document.getElementById('eventos-tab');
            var eventosPane = document.getElementById('eventos');
            if (eventosTab && eventosPane) {
                eventosTab.classList.add('active');
                eventosPane.classList.add('show', 'active');
                // Quitar la clase active de otras pestañas y panes
                document.querySelectorAll('.nav-link.active').forEach(function(el) {
                    if (el !== eventosTab) el.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane.active').forEach(function(el) {
                    if (el !== eventosPane) el.classList.remove('show', 'active');
                });
                // Forzar un redibujado del calendario
                calendar.updateSize();
            }
        });
    }
}

function getCurrentUserName() {
    const userNameElement = document.querySelector('.sidebar h4:last-of-type');
    if (userNameElement) {
        currentUserName = userNameElement.innerText;
    }
}

function initializeEventListeners() {
    $('#eventForm').on('submit', function(e) {
        e.preventDefault();
        addEvent();
    });

    $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        updateProfile();
    });

    flatpickr("#eventDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
}

function addEvent() {
    const title = document.getElementById('eventTitle').value.trim();
    const date = document.getElementById('eventDate').value.trim();
    const description = document.getElementById('eventDescription').value.trim();

    if (!title || !date) {
        alert('Por favor, completa todos los campos requeridos.');
        return;
    }

    $.ajax({
        url: "add_event.php",
        type: "POST",
        data: {
            title: title,
            date: date,
            description: description
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('Evento agregado con éxito');
                $('#calendar').fullCalendar('refetchEvents');
                $('#eventModal').modal('hide');
                document.getElementById('eventForm').reset();
                loadUpcomingEvents();
            } else {
                alert('Error al agregar el evento.');
            }
        },
        error: function() {
            alert('Error al agregar el evento.');
        }
    });
}

function updateProfile() {
    const nombre = document.getElementById('nombre').value.trim();
    const apellidos = document.getElementById('apellidos').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const puesto = document.getElementById('puesto').value.trim();

    $.ajax({
        url: "update_profile.php",
        type: "POST",
        data: {
            nombre: nombre,
            apellidos: apellidos,
            email: email,
            telefono: telefono,
            puesto: puesto
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('Perfil actualizado exitosamente.');
                updateSidebarInfo(response.user);
            } else {
                alert('Error al actualizar el perfil.');
            }
        },
        error: function() {
            alert('Error al actualizar el perfil.');
        }
    });
}

function updateSidebarInfo(user) {
    document.querySelector('.sidebar h4:last-of-type').innerText = user.nombre + ' ' + user.apellidos;
    document.querySelector('.sidebar p:nth-of-type(1)').innerText = user.cedula;
    document.querySelector('.sidebar p:nth-of-type(2)').innerText = user.email;
    document.querySelector('.sidebar p:nth-of-type(3)').innerText = user.telefono;
    document.querySelector('.sidebar p:nth-of-type(4)').innerText = user.puesto;
}

function loadUpcomingEvents() {
    $.ajax({
        url: 'get_upcoming_events.php',
        type: 'GET',
        dataType: 'json',
        success: function(events) {
            var eventList = $('#upcomingEvents');
            eventList.empty();
            events.forEach(function(event) {
                eventList.append('<li>' + event.title + ' - ' + event.start + '</li>');
            });
        },
        error: function() {
            console.log('Error al cargar los próximos eventos');
        }
    });
}

function uploadProfileImage() {
    const formData = new FormData(document.getElementById('profileImageForm'));

    fetch('upload_profile_image.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Imagen de perfil actualizada con éxito');
                // Actualizar la imagen en la página
                document.querySelector('.sidebar img').src = data.imagePath + '?t=' + new Date().getTime();
            } else {
                alert('Error al actualizar la imagen de perfil: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al subir la imagen');
        });
}