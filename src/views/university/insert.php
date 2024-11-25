<?php
require_once __DIR__ . '/../../config/db.php';

// Parámetros generales
$table = 'universities';  // Tabla en la que deseas insertar (esto puede cambiar según lo que necesites)
$columns = ['name', 'city'];  // Columnas de la tabla para insertar
$placeholders = [':name', ':city'];  // Placeholders para el SQL
$form_fields = ['name', 'city']; // Los campos del formulario que se corresponden con las columnas

// Mensajes de éxito o error
$message = '';
$alertClass = '';

// Procesar la inserción cuando el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $values = [];
    foreach ($form_fields as $field) {
        $values[$field] = $_POST[$field] ?? '';  // Obtener el valor del formulario, o vacío si no existe
    }

    // Construir la consulta SQL para la inserción
    $sql = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
    $stmt = $pdo->prepare($sql);

    // Asociar los valores con los placeholders
    foreach ($values as $key => $value) {
        $stmt->bindParam(':' . $key, $values[$key]);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $message = "Registro creado con éxito.";
        $alertClass = "alert-success";
    } else {
        $message = "Error al crear el registro.";
        $alertClass = "alert-danger";
    }
}

// Obtener las universidades o cualquier otro dato necesario para el formulario
if ($table === 'careers') {
    $sql = "SELECT id, name FROM universities";
    $stmt = $pdo->query($sql);
    $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include __DIR__ . '/../headers.php'; ?>
<?php include __DIR__ . '/../navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Crear <?php echo ucfirst($table); ?></h1>

    <!-- Mostrar mensaje de éxito o error -->
    <?php if (!empty($message)): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para insertar datos -->
    <form method="post" class="needs-validation" novalidate>
        <?php foreach ($form_fields as $field): ?>
            <div class="mb-3">
                <label for="<?php echo $field; ?>" class="form-label"><?php echo ucfirst($field); ?></label>
                <?php if ($field === 'university_id' && isset($universities)): ?>
                    <!-- Campo de selección para universidades -->
                    <select class="form-select" id="<?php echo $field; ?>" name="<?php echo $field; ?>" required>
                        <option value="" disabled selected>Selecciona una universidad</option>
                        <?php foreach ($universities as $university): ?>
                            <option value="<?php echo $university['id']; ?>"><?php echo htmlspecialchars($university['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else: ?>
                    <!-- Campo de texto para otras columnas -->
                    <input type="text" class="form-control" id="<?php echo $field; ?>" name="<?php echo $field; ?>" required>
                <?php endif; ?>
                <div class="invalid-feedback">
                    Por favor, ingresa un valor para <?php echo ucfirst($field); ?>.
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Crear Registro</button>
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
