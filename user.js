document.addEventListener('DOMContentLoaded', () => {
    const userForm = document.getElementById('user-form');
    const settingsForm = document.getElementById('settings-form');
    const body = document.body;
    const themeSelect = document.getElementById('theme');
    
    // Para cargar el tema desde el almacenamiento local
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        body.classList.toggle('dark-theme', savedTheme === 'dark');
        themeSelect.value = savedTheme;
    }

    userForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Para agregar y guardar la información del usuario
        alert('Cambios en la información del usuario guardados.');
    });

    settingsForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // para agregar y guardar las configuraciones
        alert('Configuraciones guardadas.');
    });

    themeSelect.addEventListener('change', () => {
        const selectedTheme = themeSelect.value;
        body.classList.toggle('dark-theme', selectedTheme === 'dark');
        localStorage.setItem('theme', selectedTheme);
    });
});

function addChildUser() {
    const childUsersDiv = document.getElementById('childUsers');

    const childUserDiv = document.createElement('div');
    childUserDiv.className = 'child-user';

    // Función para crear campos de entrada
    function createField(type, placeholder, labelText) {
        const container = document.createElement('div');
        container.className = 'form-group';

        const label = document.createElement('label');
        label.textContent = labelText;

        const input = document.createElement('input');
        input.type = type;
        input.placeholder = placeholder;

        container.appendChild(label);
        container.appendChild(input);

        return container;
    }

    childUserDiv.appendChild(createField('text', 'Nombre completo del estudiante', 'Nombre completo del estudiante'));
    childUserDiv.appendChild(createField('date', '', 'Fecha de nacimiento'));

    // Contenedor de selección de género
    const genderSelectContainer = document.createElement('div');
    genderSelectContainer.className = 'form-group';

    const genderLabel = document.createElement('label');
    genderLabel.textContent = 'Género:';

    const genderSelect = document.createElement('select');
    const maleOption = document.createElement('option');
    maleOption.value = 'male';
    maleOption.textContent = 'Masculino';
    const femaleOption = document.createElement('option');
    femaleOption.value = 'female';
    femaleOption.textContent = 'Femenino';
    const otherOption = document.createElement('option');
    otherOption.value = 'other';
    otherOption.textContent = 'Otro';
    genderSelect.appendChild(maleOption);
    genderSelect.appendChild(femaleOption);
    genderSelect.appendChild(otherOption);

    genderSelectContainer.appendChild(genderLabel);
    genderSelectContainer.appendChild(genderSelect);
    childUserDiv.appendChild(genderSelectContainer);

    childUserDiv.appendChild(createField('text', 'Dirección de residencia', 'Dirección de residencia'));
    childUserDiv.appendChild(createField('tel', 'Número de teléfono', 'Teléfono/celular'));
    childUserDiv.appendChild(createField('email', 'Correo electrónico', 'Correo electrónico'));

    // Contenedor de adecuación curricular
    const curriculumAdjustmentContainer = document.createElement('div');
    curriculumAdjustmentContainer.className = 'form-group';

    const curriculumAdjustmentLabel = document.createElement('label');
    curriculumAdjustmentLabel.textContent = 'Adecuación curricular:';

    const curriculumAdjustmentSelect = document.createElement('select');
    const yesOption = document.createElement('option');
    yesOption.value = 'yes';
    yesOption.textContent = 'Sí';
    const noOption = document.createElement('option');
    noOption.value = 'no';
    noOption.textContent = 'No';
    curriculumAdjustmentSelect.appendChild(yesOption);
    curriculumAdjustmentSelect.appendChild(noOption);

    curriculumAdjustmentContainer.appendChild(curriculumAdjustmentLabel);
    curriculumAdjustmentContainer.appendChild(curriculumAdjustmentSelect);
    childUserDiv.appendChild(curriculumAdjustmentContainer);

    // Contenedor de grado de estudiante
    const gradeLevelContainer = document.createElement('div');
    gradeLevelContainer.className = 'form-group';

    const gradeLevelLabel = document.createElement('label');
    gradeLevelLabel.textContent = 'Grado de estudiante:';

    const gradeLevelSelect = document.createElement('select');
    const firstOption = document.createElement('option');
    firstOption.value = 'first';
    firstOption.textContent = 'Primero';
    const secondOption = document.createElement('option');
    secondOption.value = 'second';
    secondOption.textContent = 'Segundo';
    const thirdOption = document.createElement('option');
    thirdOption.value = 'third';
    thirdOption.textContent = 'Tercero';
    const fourthOption = document.createElement('option');
    fourthOption.value = 'fourth';
    fourthOption.textContent = 'Cuarto';
    const fifthOption = document.createElement('option');
    fifthOption.value = 'fifth';
    fifthOption.textContent = 'Quinto';
    const sixthOption = document.createElement('option');
    sixthOption.value = 'sixth';
    sixthOption.textContent = 'Sexto';

    gradeLevelSelect.appendChild(firstOption);
    gradeLevelSelect.appendChild(secondOption);
    gradeLevelSelect.appendChild(thirdOption);
    gradeLevelSelect.appendChild(fourthOption);
    gradeLevelSelect.appendChild(fifthOption);
    gradeLevelSelect.appendChild(sixthOption);

    gradeLevelContainer.appendChild(gradeLevelLabel);
    gradeLevelContainer.appendChild(gradeLevelSelect);
    childUserDiv.appendChild(gradeLevelContainer);

    // Contenedor de fotocopia de cédula
    const idDocContainer = document.createElement('div');
    idDocContainer.className = 'form-group';

    const idDocLabel = document.createElement('label');
    idDocLabel.textContent = 'Fotocopia de cédula del estudiante:';

    const idDocInput = document.createElement('input');
    idDocInput.type = 'file'; // Habilitado para seleccionar archivos
    idDocContainer.appendChild(idDocLabel);
    idDocContainer.appendChild(idDocInput);
    childUserDiv.appendChild(idDocContainer);

    // Contenedor de certificado de nacimiento
    const birthCertContainer = document.createElement('div');
    birthCertContainer.className = 'form-group';

    const birthCertLabel = document.createElement('label');
    birthCertLabel.textContent = 'Certificado de nacimiento:';

    const birthCertInput = document.createElement('input');
    birthCertInput.type = 'file'; // Habilitado para seleccionar archivos
    birthCertContainer.appendChild(birthCertLabel);
    birthCertContainer.appendChild(birthCertInput);
    childUserDiv.appendChild(birthCertContainer);

    // Contenedor de certificado de estudios previos
    const proofOfStudyContainer = document.createElement('div');
    proofOfStudyContainer.className = 'form-group';

    const proofOfStudyLabel = document.createElement('label');
    proofOfStudyLabel.textContent = 'Certificado de estudios previos:';

    const proofOfStudyInput = document.createElement('input');
    proofOfStudyInput.type = 'file'; // Habilitado para seleccionar archivos
    proofOfStudyContainer.appendChild(proofOfStudyLabel);
    proofOfStudyContainer.appendChild(proofOfStudyInput);
    childUserDiv.appendChild(proofOfStudyContainer);

     // Contenedor de boleta de prematricula
     const preregistrationContainer = document.createElement('div');
     preregistrationContainer.className = 'form-group';
 
     const preregistrationLabel = document.createElement('label');
     preregistrationLabel.textContent = 'Boleta de prematricula:';
 
     const preregistrationInput = document.createElement('input');
     preregistrationInput.type = 'file'; // Habilitado para seleccionar archivos
     preregistrationContainer.appendChild(preregistrationLabel);
     preregistrationContainer.appendChild(preregistrationInput);
     childUserDiv.appendChild(preregistrationContainer);

    // Contenedor de botones
    const buttonsContainer = document.createElement('div');
    buttonsContainer.className = 'buttons-container';

    const saveButton = document.createElement('button');
    saveButton.textContent = 'Guardar';
    saveButton.className = 'save-button';
    saveButton.onclick = function () {
        
        alert('Información guardada');
    };

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Eliminar';
    removeButton.className = 'remove-button';
    removeButton.onclick = function () {
        childUsersDiv.removeChild(childUserDiv);
    };

    buttonsContainer.appendChild(saveButton);
    buttonsContainer.appendChild(removeButton);

    childUserDiv.appendChild(buttonsContainer);

    childUsersDiv.appendChild(childUserDiv);
}