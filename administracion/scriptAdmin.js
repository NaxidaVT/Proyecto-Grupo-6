$(document).ready(function() {
    // Función para cargar los datos del perfil en el modal
    function loadProfileData(profileId) {
        $.ajax({
            url: 'adminPerfil.php',
            method: 'GET',
            data: { id: profileId },
            dataType: 'json',
            success: function(response) {
                $('#profile_id').val(profileId);
                $('#nombre').val(response.nombre);
                $('#apellidos').val(response.apellidos);
                $('#cedula').val(response.cedula);
                $('#correo').val(response.correo);
                $('#telefono').val(response.telefono);
                $('#action').val('edit');
                $('#profileModal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Error al cargar los datos del perfil: ' + error);
            }
        });
    }

    // Manejar clic en el botón de editar
    $(document).on('click', '.edit-profile', function() {
        var profileId = $(this).data('id');
        loadProfileData(profileId);
    });

    // Manejar clic en el botón de eliminar
    $(document).on('click', '.delete-profile', function() {
        var profileId = $(this).data('id');
        if (confirm('¿Estás seguro de que quieres eliminar este perfil?')) {
            $.ajax({
                url: 'adminPerfil.php',
                method: 'POST',
                data: { action: 'delete', profile_id: profileId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Perfil eliminado con éxito');
                        location.reload();
                    } else {
                        alert('Error al eliminar el perfil: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error al eliminar el perfil: ' + error);
                }
            });
        }
    });

    // Manejar clic en el botón de guardar perfil
    $('#saveProfile').click(function() {
        var formData = $('#profileForm').serialize();
        $.ajax({
            url: 'adminPerfil.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert('Perfil guardado con éxito');
                    $('#profileModal').modal('hide');
                    if (response.newProfileId) {
                        var newRow = `<tr>
                            <td>${$('#nombre').val()} ${$('#apellidos').val()}</td>
                            <td>${$('#cedula').val()}</td>
                            <td>${$('#correo').val()}</td>
                            <td>${$('#telefono').val()}</td>
                            <td>
                                <button class='btn btn-sm btn-primary edit-profile' data-id='${response.newProfileId}'>Editar</button>
                                <button class='btn btn-sm btn-danger delete-profile' data-id='${response.newProfileId}'>Eliminar</button>
                            </td>
                        </tr>`;
                        $('#profilesTable tbody').append(newRow);
                    } else {
                        location.reload();
                    }
                } else {
                    alert('Error al guardar el perfil: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Error al guardar el perfil: ' + error);
            }
        });
    });

    // Manejar clic en el botón de agregar perfil
    $('.btn-add').click(function() {
        $('#profileForm')[0].reset();
        $('#profile_id').val('');
        $('#action').val('add');
        $('#profileModal').modal('show');
    });
});