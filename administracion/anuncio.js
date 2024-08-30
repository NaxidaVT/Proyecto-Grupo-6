$(document).ready(function() {
    // Manejar el clic en el botón de agregar
    $('.btn-add').click(function() {
        $('#announcementForm')[0].reset();
        $('#action').val('add');
        $('#announcementModalLabel').text('Agregar Anuncio');
    });

    // Manejar el clic en el botón de editar
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        var title = row.find('td:eq(0)').text();
        var date = row.find('td:eq(1)').text();
        var description = row.find('td:eq(2)').text();

        $('#announcement_id').val(id);
        $('#titulo').val(title);
        $('#fecha').val(date);
        $('#descripcion').val(description);
        $('#action').val('edit');
        $('#announcementModalLabel').text('Editar Anuncio');
        $('#announcementModal').modal('show');
    });

    // Manejar el guardado del anuncio
    $('#saveAnnouncement').click(function() {
        var formData = $('#announcementForm').serialize();
        $.ajax({
            url: 'anuncio_api.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert('Anuncio guardado exitosamente');
                    $('#announcementModal').modal('hide');
                    loadAnnouncements();
                } else {
                    alert('Error: ' + response.message);
                    console.error('Error details:', response);
                }
            },
            error: function(xhr, status, error) {
                alert('Error al guardar el anuncio: ' + error);
                console.error('AJAX error:', status, error);
                console.error('Response:', xhr.responseText);
            }
        });
    });

    // Manejar el clic en el botón de eliminar
    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        if (confirm('¿Estás seguro de que quieres eliminar este anuncio?')) {
            $.ajax({
                url: 'anuncio_api.php',
                method: 'POST',
                data: { action: 'delete', id: id },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Anuncio eliminado exitosamente');
                        loadAnnouncements();
                    } else {
                        alert('Error: ' + response.message);
                        console.error('Error details:', response);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error al eliminar el anuncio: ' + error);
                    console.error('AJAX error:', status, error);
                    console.error('Response:', xhr.responseText);
                }
            });
        }
    });

    // Cargar anuncios al iniciar la página
    loadAnnouncements();

    function loadAnnouncements() {
        $.ajax({
            url: 'anuncio_api.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    updateAnnouncementsTable(response.data);
                } else {
                    console.error('Error al cargar anuncios:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    }

    function updateAnnouncementsTable(announcements) {
        var tbody = $('#announcementsTable tbody');
        tbody.empty();
        announcements.forEach(function(announcement) {
            var row = `<tr>
                <td>${announcement.title}</td>
                <td>${announcement.date}</td>
                <td>${announcement.description}</td>
                <td>
                    <button class="btn btn-warning btn-edit mt-1 mb-1" data-id="${announcement.announcement_id}">
                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                    </button>
                    <button class="btn btn-danger btn-delete mt-1 mb-1" data-id="${announcement.announcement_id}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>`;
            tbody.append(row);
        });
    }
});