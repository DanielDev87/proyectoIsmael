<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $university_id = $_POST['university_id'];

    // Insertar carrera en la base de datos
    $sql = "INSERT INTO careers (name, university_id) VALUES (:name, :university_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':university_id', $university_id);

    if ($stmt->execute()) {
        $message = "Carrera creada con éxito.";
        $alertClass = "alert-success";
    } else {
        $message = "Error al crear la carrera.";
        $alertClass = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Carrera</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Carrera</h1>

    <?php if (!empty($message)): ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la carrera</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback">
                Por favor, ingresa el nombre de la carrera.
            </div>
        </div>
        <div class="mb-3">
            <label for="university_id" class="form-label">Universidad</label>
            <select class="form-select" id="university_id" name="university_id" required>
                <option value="" disabled selected>Selecciona una universidad</option>
                <?php
                // Mostrar las universidades disponibles
                $sql = "SELECT id, name FROM universities";
                $stmt = $pdo->query($sql);
                $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($universities as $university) {
                    echo "<option value='" . $university['id'] . "'>" . $university['name'] . "</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback">
                Por favor, selecciona una universidad.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear Carrera</button>
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

</body>
</html>
