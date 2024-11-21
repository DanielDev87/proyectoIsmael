<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validación simple
    if ($username === 'admin' && $password === 'password') {
        header('Location: /career/select');
        exit();
    } else {
        echo "<h1>Credenciales inválidas</h1>";
    }
}
?>

<form method="POST">
    <label>Usuario: <input type="text" name="username"></label><br>
    <label>Contraseña: <input type="password" name="password"></label><br>
    <button type="submit">Ingresar</button>
</form>
