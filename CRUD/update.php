<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $id = $_POST['id'];  // ID del usuario a actualizar
    $username = $_POST['username'];
    $password = $_POST['password'];  // Nuevamente, encriptamos la contraseña
    
    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Actualizar en la base de datos
    $sql = "UPDATE users SET username = :username, password = :password WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>

<!-- Formulario HTML -->
<form method="post">
    ID del usuario: <input type="text" name="id" required><br>
    Nuevo nombre de usuario: <input type="text" name="username" required><br>
    Nueva contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Actualizar Usuario">
</form>