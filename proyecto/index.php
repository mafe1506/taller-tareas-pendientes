<?php

require 'config/Database.php';
require 'classes/CRUD.php';


$db = new Database();
$conn = $db->getConnection();


$crud = new CRUD($conn);


$tareas = $crud->obtenerTareas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
</head>
<body class="body">
    <header class="header">
        <h1>Control de Tareas de Mafe</h1>
    </header>

    <div class="container mt-5">
        <h2>Control de Tareas Pendientes</h2>
        
        
        <a href="crear.php" class="btn btn-primary mb-3">Nueva Tarea</a>
        
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['id'] ?></td>
                        <td><?= $tarea['tarea'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td><?= $tarea['fecha_vencimiento'] ?></td>
                        <td><?= ucfirst($tarea['estado']) ?></td>
                        <td>
                            
                            <a href="editar.php?id=<?= $tarea['id'] ?>" class="btn btn-warning btn-sm">Editar</a> 
                            <br/>
                            <a href="eliminar.php?id=<?= $tarea['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
    <footer class="footer mt-5 py-3 bg-dark text-white text-center">
        <p>&copy; 2024 Mafe. Todos los derechos reservados.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const alertType = urlParams.get('alert'); 
            const alertMessage = urlParams.get('message'); 

            if (alertType && alertMessage) {
                
                if (alertType === 'success') {
                    alertify.success(alertMessage);
                } else if (alertType === 'error') {
                    alertify.error(alertMessage);
                }
            }
        }
    </script>
</body>
</html>
