<?php
include 'db.php';

$sql = "SELECT * FROM universities";
$stmt = $pdo->query($sql);
$universities = $stmt->fetchAll();

echo "<h1>Lista de Universidades</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Acciones</th>
        </tr>";



fore
foreach ($universities as $university) {
    echo "<tr>
            <td>" . $university['id'] . "</td>
            <td>" . $university['name'] . "</td>
            <td>" . $university['city'] . "</td>
            <td>
                <a href='update.php?id=" . $university['id'] . "'>Actualizar</a> |
                <a href='delete.php?id=" . $university['id'] . "'>Eliminar</a>
            </td>
          </tr>";
}


echo "</table>";
?>