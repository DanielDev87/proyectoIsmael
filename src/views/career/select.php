<?php
include 'db.php';

// Obtener todas las carreras junto con el nombre de la universidad
$sql = "SELECT careers.id, careers.name AS career_name, universities.name AS university_name
        FROM careers
        JOIN universities ON careers.university_id = universities.id";
$stmt = $pdo->query($sql);
$careers = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($careers) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Carrera</th>
                    <th>Universidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";
    foreach ($careers as $career) {
        echo "<tr>
                <td>" . htmlspecialchars($career['id']) . "</td>
                <td>" . htmlspecialchars($career['career_name']) . "</td>
                <td>" . htmlspecialchars($career['university_name']) . "</td>
                <td>
                    <a href='update" . $career['id'] . "'>updatear</a> |
                    <a href='delete?id=" . $career['id'] . "'>Eliminar</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No se encontraron carreras.";
}
?>