<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles de la carrera
    $sql = "SELECT * FROM careers WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $career = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($career) {
        // Mostrar el formulario de edición
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $university_id = $_POST['university_id'];

            // Actualizar carrera
            $sql = "UPDATE careers SET name = :name, university_id = :university_id WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':university_id', $university_id);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "Carrera actualizada con éxito.";
            } else {
                echo "Error al actualizar la carrera.";
            }
        }
        ?>

        <form method="post">
            Nombre de la carrera: <input type="text" name="name" value="<?php echo htmlspecialchars($career['name']); ?>" required><br>
            Universidad:
            <select name="university_id" required>
                <?php
                // Mostrar las universidades disponibles
                $sql = "SELECT id, name FROM universities";
                $stmt = $pdo->query($sql);
                $universities = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($universities as $university) {
                    $selected = $career['university_id'] == $university['id'] ? 'selected' : '';
                    echo "<option value='" . $university['id'] . "' $selected>" . $university['name'] . "</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Actualizar Carrera">
        </form>

        <?php
    } else {
        echo "Carrera no encontrada.";
    }
}
?>