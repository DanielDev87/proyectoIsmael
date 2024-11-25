<?php
session_start();

// Si no hay usuario autenticado, redirigir al login
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}
?>
<a href="/logout">Cerrar Sesión</a>
