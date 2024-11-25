<?php
include 'db.php';

// Obtener todas las carreras junto con el nombre de la universidad
$sql = "SELECT careers.id, careers.name AS career_name, universities.name AS university_name
        FROM careers
        JOIN universities ON careers.university_id = universities.id";
$stmt = $pdo->query($sql);
$careers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Carreras</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Listado de Carreras</h1>
    <?php if ($careers): ?>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Universidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($careers as $career): ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($career['id']); ?></th>
                        <td><?php echo htmlspecialchars($career['career_name']); ?></td>
                        <td><?php echo htmlspecialchars($career['university_name']); ?></td>
                        <td>
                            <a href="update?id=<?php echo $career['id']; ?>" class="btn btn-warning btn-sm">Actualizar</a>
                            <a href="delete?id=<?php echo $career['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta carrera?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            No se encontraron carreras.
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
