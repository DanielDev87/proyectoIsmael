<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar el ID del usuario a eliminar
    $id = $_POST['id'];

    // Eliminar el usuario
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar el usuario.";
    }
}
?>

<!-- Formulario HTML -->
<form method="post">
    ID del usuario a eliminar: <input type="text" name="id" required><br>
    <input type="submit" value="Eliminar Usuario">
</form>