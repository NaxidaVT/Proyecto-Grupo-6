<?php include 'components/index_navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Preguntas Frecuentes (FAQ)</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="faqAccordion">
                    <!-- Pregunta 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo puedo crear una cuenta?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Para crear una cuenta, simplemente haz clic en el botón de registro en la página principal y sigue las instrucciones proporcionadas en el formulario de registro.
                            </div>
                        </div>
                    </div>
                    <!-- Pregunta 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Cuándo es el proceso de matrícula en línea?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                En el calendario que emite la escuela en cada año lectivo, se
                                establecen los períodos de los procesos de matrícula en línea que se llevan a cabo.
                            </div>
                        </div>
                    </div>
                    <!-- Pregunta 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cómo puedo saber si mi hijo fue matriculado con
                                éxito?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                La escuela generalmente notificará a los padres por
                                correo electrónico sobre el estado de la matrícula. </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>