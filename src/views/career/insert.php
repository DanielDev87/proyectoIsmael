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
        echo "Carrera creada con éxito.";
    } else {
        echo "Error al crear la carrera.";
    }
}
?>

<!-- Formulario HTML -->
<form method="post">
    Nombre de la carrera: <input type="text" name="name" required><br>
    Universidad:
    <select name="university_id" required>
        <?php
        // Mostrar las universidades disponibles
        $sql = "SELECT id, name FROM universities";
        $stmt = $pdo->query($sql);
        $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($universities as $university) {
            echo "<option value='" . $university['id'] . "'>" . $university['name'] . "</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Crear Carrera">
</form>