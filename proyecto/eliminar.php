<?php

require 'config/Database.php';
require 'classes/CRUD.php';

//  base de datos
$db = new Database();
$conn = $db->getConnection();
$crud = new CRUD($conn);


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $resultado = $crud->eliminarTarea($id);

    
    if ($resultado === true) {
        
        header("Location: index.php?alert=success&message=Tarea eliminada exitosamente.");
    } else {
        
        header("Location: index.php?alert=error&message=Error al eliminar la tarea.");
    }
} else {

    header("Location: index.php?alert=error&message=Tarea no encontrada.");
}
exit();
?>
