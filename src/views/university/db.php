<?php
$host = 'localhost'; // o tu servidor
$dbname = 'nombre_de_tu_base_de_datos';
$username = 'tu_usuario';
$password = 'tu_contraseña';

// Crear la conexión
try {
    
 
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
}
catch (PDOException $e) {
    
    di

 
die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>