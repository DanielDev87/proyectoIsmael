<!-- views/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Universidades</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Encuentra tu Universidad</h1>
        <form id="formBusqueda" class="form-inline">
            <input type="text" id="ciudad" class="form-control" placeholder="Ciudad" required>
            <input type="text" id="carrera" class="form-control" placeholder="Carrera" required>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <script src="../assets/script.js"></script>
</body>
</html>
