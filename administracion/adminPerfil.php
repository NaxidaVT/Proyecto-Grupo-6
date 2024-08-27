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

    <div class="container">
        <div class="card">
            <div class="card-header">
                Listado de Perfiles
            </div>
            
            <div class="card-body">
               
                <div class="search-bar-container">
                    <input class="form-control search-bar" id="busquedadCedula" type="text" placeholder="Buscar por cédula">
                    <button class="btn btn-search">Buscar</button>
                </div> 
            </div>
        </div> 
        
        <div class="card">
           
            <div class="card-header">
                <button class="btn btn-add" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-plus"></i>
                </button>
                <span>Tabla de Perfiles</span>
            </div> 

            
            <div class="card-body">
                
                <div class="table-responsive">
                  
                    <table class="table table-bordered" id="profilesTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Número de Cédula</th>
                                <th>E-mail de Contacto</th>
                                <th>Teléfono</th>
                                <th>Alumnos bajo Supervisión</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Juan Solis</td>
                                <td>1234567890</td>
                                <td>juan@gmail.com</td>
                                <td>123-1234</td>
                                <td>1</td>
                                <td>
                                    <button class="btn btn-warning btn-edit" data-toggle="modal"
                                        data-target="#profileModal" data-id="1">
                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div> 
    </div> 

    
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
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos">
                        </div>
                        <div class="form-group">
                            <label for="cedula">Número de Cédula</label>
                            <input type="number" class="form-control" id="cedula" placeholder="Ingresa el número de cédula">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" placeholder="Ingresa tu teléfono">
                        </div>
                        <div id="studentsContainer">
                        </div>
                        <button type="button" class="btn btn-add" id="addStudent">Agregar Estudiante</button>
                    </form> 
                </div> 

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-add" id="saveProfile">Guardar</button>
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
