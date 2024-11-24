<?php

require 'config/Database.php';
require 'classes/CRUD.php';

$db = new Database();
$conn = $db->getConnection();


$crud = new CRUD($conn);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $tarea = $_POST['tarea'];
    $descripcion = $_POST['descripcion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $estado = $_POST['estado'];

    $crud->crearTarea($tarea, $descripcion, $fecha_vencimiento, $estado);

   
    header("Location: index.php?alert=success&message=Tarea creada exitosamente.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
</head>
<body>
    <div class="container mt-5">
        <h2>Crear Nueva Tarea</h2>
      
        <form method="POST">
            <div class="mb-3">
                <label for="tarea" class="form-label">Tarea</label>
                <input type="text" class="form-control" id="tarea" name="tarea" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="completado">Completado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Tarea</button>
        </form>
    </div>

   
    <footer class="footer mt-5 py-3 bg-dark text-white text-center">
        <p>&copy; 2024 Mafe. Todos los derechos reservados.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>
</html>
