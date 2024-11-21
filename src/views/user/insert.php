<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];  // Asegúrate de usar un hash seguro
    
    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertar en la base de datos
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        echo "Usuario creado con éxito.";
    } else {
        echo "Error al crear el usuario.";
    }
}
?>

<!-- Formulario HTML -->
<form method="post">
    Nombre de usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Crear Usuario">
</form>