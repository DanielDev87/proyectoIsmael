<?php
require_once __DIR__ . '/../../config/db.php';

// Parámetros generales
$table = 'users';  // Nombre de la tabla (puede cambiarse por cualquier otra tabla)
$primaryKey = 'username';  // Nombre de la columna primaria (puede ser 'id' o cualquier otra columna que identifique el registro)

// Verificar si se ha pasado un ID a través de GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Construir la consulta SQL para eliminar el registro
    $sql = "DELETE FROM $table WHERE $primaryKey = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $message = ucfirst($table) . " eliminada con éxito.";
        $alertClass = "alert-success";
    } else {
        $message = "Error al eliminar el registro.";
        $alertClass = "alert-danger";
    }
} else {
    $message = "No se proporcionó un ID.";
    $alertClass = "alert-warning";
}

// Incluir el header y navbar
include __DIR__ . '/../headers.php';
include __DIR__ . '/../navbar.php';
?>

<!-- Contenido de la página -->
<div class="container py-3">
    <?php if (isset($message)): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</div>

<?php
// Incluir el footer
include __DIR__ . '/../footer.php';
?>
