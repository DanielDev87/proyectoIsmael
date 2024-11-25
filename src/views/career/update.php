<?php
require_once __DIR__ . '/../../config/db.php';

// Parámetros generales
$table = 'careers';  // Tabla en la que deseas hacer el update
$form_fields = ['name', 'university_id', 'area'];  // Campos específicos para la tabla 'careers'
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
        $university_id = $_POST['university_id'] ?? '';
        $area = $_POST['area'] ?? '';

        // Construir la consulta SQL para la actualización
        $sql_update = "UPDATE $table SET name = :name, university_id = :university_id, area = :area WHERE $id_field = :id";
        $stmt = $pdo->prepare($sql_update);

        // Asociar los valores de los campos y el ID
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':university_id', $university_id);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header('Location: /career/select');  // Redirigir a la lista de carreras
            exit();
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
    <h1 class="mb-4">Actualizar Carrera</h1>

    <!-- Mostrar mensaje de éxito o error -->
    <?php if ($message): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para actualizar datos -->
    <form method="post" class="needs-validation" novalidate>
        <!-- Campo para el nombre de la carrera -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la carrera</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($record['name'] ?? ''); ?>" required>
            <div class="invalid-feedback">
                Por favor, ingresa el nombre de la carrera.
            </div>
        </div>

        <!-- Campo para la universidad -->
        <div class="mb-3">
            <label for="university_id" class="form-label">Universidad</label>
            <select class="form-select" id="university_id" name="university_id" required>
                <option value="" disabled>Selecciona una universidad</option>
                <?php
                // Obtener las universidades para el campo select
                $sql = "SELECT id, name FROM universities";
                $stmt = $pdo->query($sql);
                $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($universities as $university):
                    $selected = ($university['id'] == $record['university_id']) ? 'selected' : '';
                ?>
                    <option value="<?php echo $university['id']; ?>" <?php echo $selected; ?>>
                        <?php echo htmlspecialchars($university['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Por favor, selecciona una universidad.
            </div>
        </div>

        <!-- Campo para el área -->
        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" class="form-control" id="area" name="area" value="<?php echo htmlspecialchars($record['area'] ?? ''); ?>" required>
            <div class="invalid-feedback">
                Por favor, ingresa el área de la carrera.
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
 