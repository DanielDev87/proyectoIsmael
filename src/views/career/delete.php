<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar carrera
    $sql = "DELETE FROM careers WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Carrera eliminada con éxito.";
    } else {
        echo "Error al eliminar la carrera.";
    }
}
?>