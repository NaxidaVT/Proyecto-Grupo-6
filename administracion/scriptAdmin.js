$(document).ready(function() {
    let studentIndex = 0;

    // Función para agregar campos de estudiante
    $('#addStudent').click(function() {
        studentIndex++;
        $('#studentsContainer').append(`
            <div class="student-entry mb-2" id="student-${studentIndex}">
                <h5 class="mt-2">Estudiante ${studentIndex}</h5>
                <div class="form-group">
                    <label for="cedula-${studentIndex}">Cédula del Estudiante</label>
                    <input type="text" class="form-control" id="cedula-${studentIndex}" placeholder="Ingresa la cédula">
                </div>
                <div class="form-group">
                    <label for="nombre-${studentIndex}">Nombre del Estudiante</label>
                    <input type="text" class="form-control" id="nombre-${studentIndex}" placeholder="Ingresa el nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos-${studentIndex}">Apellidos del Estudiante</label>
                    <input type="text" class="form-control" id="apellidos-${studentIndex}" placeholder="Ingresa los apellidos">
                </div>
                <div class="form-group">
                    <label for="parentesco-${studentIndex}">Parentesco</label>
                    <input type="text" class="form-control" id="parentesco-${studentIndex}" placeholder="Ingresa el parentesco">
                </div>
                <button type="button" class="btn btn-danger remove-student" data-id="${studentIndex}">Eliminar Estudiante</button>
            </div>
        `);
    });

    // Función para eliminar campos de estudiante
    $(document).on('click', '.remove-student', function() {
        let id = $(this).data('id');
        $(`#student-${id}`).remove();
    });

    // Simulación de carga de perfil para edición
    $('.btn-edit').click(function() {
        let profileId = $(this).data('id');
        // Aquí deberías cargar datos reales desde el servidor según el profileId
        // Por ejemplo, rellenar campos con valores ficticios para demostrar
        $('#nombre').val('Juan Solis');
        $('#apellidos').val('Solis');
        $('#correo').val('juan@gmail.com');
        $('#telefono').val('123-1234');
        $('#studentsContainer').html(`
            <div class="student-entry mb-2" id="student-1">
                <h5 class="mt-2">Estudiante 1</h5>
                <div class="form-group">
                    <label for="cedula-1">Cédula del Estudiante</label>
                    <input type="text" class="form-control" id="cedula-1" value="123456789" placeholder="Ingresa la cédula">
                </div>
                <div class="form-group">
                    <label for="nombre-1">Nombre del Estudiante</label>
                    <input type="text" class="form-control" id="nombre-1" value="María" placeholder="Ingresa el nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos-1">Apellidos del Estudiante</label>
                    <input type="text" class="form-control" id="apellidos-1" value="González" placeholder="Ingresa los apellidos">
                </div>
                <div class="form-group">
                    <label for="parentesco-1">Parentesco</label>
                    <input type="text" class="form-control" id="parentesco-1" value="Hijo" placeholder="Ingresa el parentesco">
                </div>
                <button type="button" class="btn btn-danger remove-student" data-id="1">Eliminar Estudiante</button>
            </div>
        `);
    });

});