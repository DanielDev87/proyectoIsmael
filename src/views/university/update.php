<?php
require_once __DIR__ . '/../../config/db.php';

// Parámetros generales
$table = 'universities';  // Tabla en la que deseas hacer el update
$form_fields = ['name', 'city'];  // Campos específicos para la tabla 'universities'
$id_field = 'id';  // El campo del ID en la tabla

// Mensajes de éxito o error
$message = '';
$alertClass = '';

// Obtener el ID desde la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales del registro
    $sql = "SELECT * FROM $table WHERE $id_field = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si el registro existe y se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los valores del formulario
        $name = $_POST['name'] ?? '';
        $city = $_POST['city'] ?? '';

        // Construir la consulta SQL para la actualización
        $sql_update = "UPDATE $table SET name = :name, city = :city WHERE $id_field = :id";
        $stmt = $pdo->prepare($sql_update);

        // Asociar los valores de los campos y el ID
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header('Location: /university/select');
        } else {
            $message = "Error al actualizar el registro.";
            $alertClass = "alert-danger";
        }
    }
} else {
    $message = "No se ha especificado un ID válido.";
    $alertClass = "alert-warning";
}
?>

<?php include __DIR__ . '/../headers.php'; ?>
<?php include __DIR__ . '/../navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Actualizar Universidad</h1>

    <!-- Mostrar mensaje de éxito o error -->
    <?php if ($message): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para actualizar datos -->
    <form method="post" class="needs-validation" novalidate>
        <!-- Campo para el nombre de la universidad -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($record['name'] ?? ''); ?>" required>
            <div class="invalid-feedback">
                Por favor, ingresa un nombre para la universidad.
            </div>
        </div>

        <!-- Campo para la ubicación de la universidad -->
        <div class="mb-3">
            <label for="city" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($record['city'] ?? ''); ?>" required>
            <div class="invalid-feedback">
                Por favor, ingresa la ubicación de la universidad.
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Registro</button>
    </form>
</div>

<script>
    // Validación de Bootstrap
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>

<?php include __DIR__ . '/../footer.php'; ?>
