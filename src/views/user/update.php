<?php
require_once __DIR__ . '/../../config/db.php';

// Parámetros generales
$table = 'users';  // Tabla en la que deseas hacer el update
$form_fields = ['password'];  // Solo el campo 'password' es relevante
$id_field = 'id';  // El campo del ID en la tabla

// Mensajes de éxito o error
$message = '';
$alertClass = '';

// Obtener el ID desde la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales del registro (para ver si el usuario existe)
    $sql = "SELECT * FROM $table WHERE $id_field = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si el registro existe y se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener la nueva contraseña
        $password = $_POST['password'] ?? '';

        // Si la contraseña es proporcionada, hacer un hash
        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Construir la consulta SQL para la actualización de la contraseña
            $sql_update = "UPDATE $table SET password = :password WHERE $id_field = :id";
            $stmt = $pdo->prepare($sql_update);

            // Asociar los valores de los campos y el ID
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':id', $id);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $message = "Contraseña actualizada con éxito.";
                $alertClass = "alert-success";
            } else {
                $message = "Error al actualizar la contraseña.";
                $alertClass = "alert-danger";
            }
        } else {
            $message = "Por favor, ingresa una nueva contraseña.";
            $alertClass = "alert-warning";
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
    <h1 class="mb-4">Actualizar Contraseña</h1>

    <!-- Mostrar mensaje de éxito o error -->
    <?php if ($message): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para actualizar la contraseña -->
    <form method="post" class="needs-validation" novalidate>
        <!-- Campo para la nueva contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Nueva Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Por favor, ingresa una nueva contraseña.
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
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
