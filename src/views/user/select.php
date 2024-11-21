<?php
include 'db.php';  // Incluir la conexión a la base de datos

// Verificar si hay un término de búsqueda
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Consulta SQL con filtro por nombre de usuario
$sql = "SELECT id, username FROM users WHERE username LIKE :search ORDER BY username";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', '%' . $search . '%');  // Filtramos por nombre de usuario
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Formulario de búsqueda -->
<form method="get">
    <label for="search">Buscar usuario:</label>
    <input type="text" name="search" id="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar por nombre">
    <input type="submit" value="Buscar">
</form>

<!-- Tabla de usuarios -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users) {
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No se encontraron usuarios.</td></tr>";
        }
        ?>
    </tbody>
</table>