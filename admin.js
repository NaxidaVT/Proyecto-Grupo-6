// Función para buscar usuarios
function buscarUsuario() {
    const query = document.getElementById('search-carnet-cedula').value;
   
    const usuarios = [
        { id: 1, nombre: "David Ramírez", carnet: "12790", cedula: "403180543" },
        { id: 2, nombre: "Ana Gómez", carnet: "67890", cedula: "705380543" }
    ];
    mostrarUsuarios(usuarios);
}

// Función para mostrar usuarios
function mostrarUsuarios(usuarios) {
    const userList = document.getElementById('user-list');
    userList.innerHTML = '';
    usuarios.forEach(usuario => {
        const userDiv = document.createElement('div');
        userDiv.className = 'user';
        userDiv.innerHTML = `
            <span>${usuario.nombre} - Carnet: ${usuario.carnet} - Cédula: ${usuario.cedula}</span>
            <div>
                <button class="update" onclick="actualizarUsuario(${usuario.id})">Actualizar</button>
                <button class="delete" onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
            </div>
        `;
        userList.appendChild(userDiv);
    });
}

// Función para buscar matrículas
function buscarMatricula() {
    const query = document.getElementById('search-matricula').value;
    
   
    const matriculas = [
        { id: 1, nombre: "Curso lectivo 2024", carnet: "12790", cedula: "403180543", estado: "Pendiente" },
        { id: 2, nombre: "Curso lectivo 2023", carnet: "67890", cedula: "705380543", estado: "Pendiente" }
    ];
    mostrarMatriculas(matriculas);
}

// Función para mostrar matrículas
function mostrarMatriculas(matriculas) {
    const matriculaList = document.getElementById('matricula-list');
    matriculaList.innerHTML = '';
    matriculas.forEach(matricula => {
        const matriculaDiv = document.createElement('div');
        matriculaDiv.className = 'matricula';
        matriculaDiv.innerHTML = `
            <span>${matricula.nombre} - Carnet: ${matricula.carnet} - Cédula: ${matricula.cedula} - Estado: ${matricula.estado}</span>
            <div>
                <button class="accept" onclick="aceptarMatricula(${matricula.id})">Aceptar</button>
                <button class="deny" onclick="denegarMatricula(${matricula.id})">Denegar</button>
            </div>
            <div>
                <label>Motivo:</label>
                <input type="text" id="motivo-${matricula.id}" placeholder="Motivo">
                <button onclick="mostrarHistorialNotas(${matricula.id})">Historial de Notas</button>
                <button onclick="descargarPDF(${matricula.id})">Descargar PDF</button>
            </div>
        `;
        matriculaList.appendChild(matriculaDiv);
    });
}

// Función para aceptar matrícula
function aceptarMatricula(id) {
    alert(`Matrícula con ID ${id} aceptada.`);
}

// Función para denegar matrícula
function denegarMatricula(id) {
    const motivo = document.getElementById(`motivo-${id}`).value;
    alert(`Matrícula con ID ${id} denegada. Motivo: ${motivo}`);
}

// Función para actualizar usuario
function actualizarUsuario(id) {
    alert(`Usuario con ID ${id} actualizado.`);
}

// Función para eliminar usuario
function eliminarUsuario(id) {
    alert(`Usuario con ID ${id} eliminado.`);
}

// Función para mostrar historial de notas
function mostrarHistorialNotas(id) {
    const notas = [
        { fecha: '2023-07-01', nota: 80 },
        { fecha: '2023-07-15', nota: 75 },
        { fecha: '2023-08-01', nota: 85 }
    ];

    const historialDiv = document.getElementById('nota-historial');
    historialDiv.innerHTML = '<h3>Historial de Notas</h3>';
    notas.forEach(nota => {
        historialDiv.innerHTML += `<p>Fecha: ${nota.fecha} - Nota: ${nota.nota}</p>`;
    });
}

// Función para descargar PDF
function descargarPDF(id) {
    const matricula = {
        nombre: "Curso lectivo 2024",
        carnet: "12790",
        cedula: "403180543",
        estado: "Pendiente"
    };
    const notas = [
        { fecha: '2023-07-01', nota: 80 },
        { fecha: '2023-07-15', nota: 75 },
        { fecha: '2023-08-01', nota: 85 }
    ];

    // Para PDF usando pdfmake
    const docDefinition = {
        content: [
            { text: 'Información de Matrícula', style: 'header' },
            { text: `Nombre: ${matricula.nombre}`, margin: [0, 10] },
            { text: `Carnet: ${matricula.carnet}`, margin: [0, 5] },
            { text: `Cédula: ${matricula.cedula}`, margin: [0, 5] },
            { text: `Estado: ${matricula.estado}`, margin: [0, 5] },
            { text: '\n' },
            { text: 'Historial de Notas', style: 'subheader' },
            { ul: notas.map(nota => `Fecha: ${nota.fecha} - Nota: ${nota.nota}`) }
        ],
        styles: {
            header: {
                fontSize: 18,
                bold: true,
                margin: [0, 0, 0, 10]
            },
            subheader: {
                fontSize: 14,
                bold: true,
                margin: [0, 10, 0, 5]
            }
        }
    };

    // Para crear el PDF y descargarlo
    pdfMake.createPdf(docDefinition).download(`matricula_${id}.pdf`);
}

// Función para buscar seguimientos
function buscarSeguimientos() {
    const query = document.getElementById('search-seguimientos').value;
    
   
    const seguimientos = [
        { id: 1, nombre: "David Ramírez", carnet: "12790", cedula: "403180543", permiso: "Pendiente" },
        { id: 2, nombre: "Ana Gómez", carnet: "67890", cedula: "705380543", permiso: "Pendiente" }
    ];
    mostrarSeguimientos(seguimientos);
}

// Función para buscar seguimientos
function buscarSeguimientos() {
    const query = document.getElementById('search-seguimientos').value;
    
    const seguimientos = [
        { id: 1, nombre: "David Ramírez", carnet: "12790", cedula: "403180543", estado: "Activo" },
        { id: 2, nombre: "Ana Gómez", carnet: "67890", cedula: "705380543", estado: "Activo" }
    ];
    mostrarSeguimientos(seguimientos);
}

// Función para mostrar seguimientos
function mostrarSeguimientos(seguimientos) {
    const seguimientosList = document.getElementById('seguimientos-list');
    seguimientosList.innerHTML = '';
    seguimientos.forEach(seguimiento => {
        const seguimientoDiv = document.createElement('div');
        seguimientoDiv.className = 'seguimiento';
        seguimientoDiv.innerHTML = `
            <span>${seguimiento.nombre} - Carnet: ${seguimiento.carnet} - Cédula: ${seguimiento.cedula} - Estado: ${seguimiento.estado}</span>
            <div>
                <button class="stop" onclick="detenerSeguimiento(${seguimiento.id})">Detener Seguimiento</button>
                <button class="delete" onclick="eliminarSeguimiento(${seguimiento.id})">Eliminar</button>
            </div>
        `;
        seguimientosList.appendChild(seguimientoDiv);
    });
}

// Función para detener seguimiento
function detenerSeguimiento(id) {
    alert(`Seguimiento con ID ${id} detenido.`);
}

// Función para eliminar seguimiento
function eliminarSeguimiento(id) {
    alert(`Seguimiento con ID ${id} eliminado.`);
}

// Función para cambiar tema
function changeTheme() {
    const theme = document.getElementById('theme').value;
    document.body.className = theme === 'dark' ? 'theme-dark' : 'theme-light';
}



