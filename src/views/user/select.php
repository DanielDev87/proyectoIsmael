<?php
require_once __DIR__ . '/../../config/db.php';

// Definir la tabla y las columnas que quieres consultar
$table = 'users';  // Tabla en la que deseas insertar (esto puede cambiar según lo que necesites)
$columns = ['username', 'password'];  // Columnas de la tabla para insertar
$columns_selected = ['username'];  // Columnas seleccionadas
$columns_show = ['Nombre'];  // Columnas seleccionadas
$search_col = ['username'];

// Verificar si hay un término de búsqueda
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Construir la consulta SQL con búsqueda si es necesario
$sql = "SELECT " . implode(', ', $columns) . " FROM $table";
if ($search) {
    $sql .= " WHERE " . implode(' LIKE :search OR ', $search_col) . " LIKE :search";
}

$stmt = $pdo->prepare($sql);
if ($search) {
    $stmt->bindValue(':search', '%' . $search . '%');
}
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include __DIR__ . '/../headers.php'; ?>
<?php include __DIR__ . '/../navbar.php'; ?>

<div class="container py-3">
<!-- Formulario de búsqueda -->
    <div class="container-fluid my-3">
        <form method="get" class="d-flex">
            <label for="search" class="visually-hidden">Buscar:</label>
            <input 
                type="text" 
                class="form-control me-2" 
                name="search" 
                id="search" 
                value="<?php echo htmlspecialchars($search); ?>" 
                placeholder="Buscar"
            >
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <?php if ($records): ?>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <?php foreach ($columns_show as $column): ?>
                        <th scope="col"><?php echo htmlspecialchars(ucfirst($column)); ?></th>
                    <?php endforeach; ?>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <?php foreach ($columns_selected as $column): ?>
                            <td><?php echo htmlspecialchars($record[$column]); ?></td>
                        <?php endforeach; ?>
                        <td>
                            <!-- <a href="update?id=<?php echo $record['username']; ?>" class="btn btn-warning btn-sm">Actualizar</a> -->
                            <a href="delete?id=<?php echo $record['username']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            No se encontraron registros.
        </div>
    <?php endif; ?>
    </div>

<?php include __DIR__ . '/../footer.php'; ?>