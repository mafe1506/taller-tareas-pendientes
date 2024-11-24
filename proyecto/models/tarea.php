<?php

class Tarea {
   
    private $id;
    private $tarea;
    private $descripcion;
    private $fecha_vencimiento;
    private $estado;

    // Constructor
    public function __construct($tarea, $descripcion, $fecha_vencimiento, $estado, $id = null) {
        $this->id = $id;
        $this->tarea = $tarea;
        $this->descripcion = $descripcion;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->estado = $estado;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getTarea() {
        return $this->tarea;
    }

    public function setTarea($tarea) {
        $this->tarea = $tarea;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFechaVencimiento() {
        return $this->fecha_vencimiento;
    }

    public function setFechaVencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    
    public function guardar($conn) {
        $query = "INSERT INTO tareas (tarea, descripcion, fecha_vencimiento, estado) 
                  VALUES (:tarea, :descripcion, :fecha_vencimiento, :estado)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':tarea', $this->tarea);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':fecha_vencimiento', $this->fecha_vencimiento);
        $stmt->bindParam(':estado', $this->estado);

        return $stmt->execute();
    }

    
    public static function obtenerTodas($conn) {
        $query = "SELECT * FROM tareas";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public static function obtenerPorId($conn, $id) {
        $query = "SELECT * FROM tareas WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function actualizar($conn) {
        $query = "UPDATE tareas SET tarea = :tarea, descripcion = :descripcion, 
                  fecha_vencimiento = :fecha_vencimiento, estado = :estado WHERE id = :id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':tarea', $this->tarea);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':fecha_vencimiento', $this->fecha_vencimiento);
        $stmt->bindParam(':estado', $this->estado);

        return $stmt->execute();
    }

    
    public static function eliminar($conn, $id) {
        $query = "DELETE FROM tareas WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
