<?php
class Enrollment {
    private $conn;
    private $table = 'matriculas';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($estudiante_id, $asignatura_id, $profesor_id) {
        $sql = "INSERT INTO $this->table (estudiante_id, asignatura_id, profesor_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $estudiante_id, $asignatura_id, $profesor_id);
        return $stmt->execute();
    }

    public function getAll() {
        $sql = "SELECT matriculas.id, estudiantes.nombre AS estudiante, asignaturas.nombre AS asignatura, profesores.nombre AS profesor
                FROM $this->table
                JOIN estudiantes ON matriculas.estudiante_id = estudiantes.id
                JOIN asignaturas ON matriculas.asignatura_id = asignaturas.id
                JOIN profesores ON matriculas.profesor_id = profesores.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
