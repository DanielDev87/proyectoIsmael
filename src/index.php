<?php
session_start(); // Iniciar sesión

$request = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($request);  // Parsear la URL
$path = $parsedUrl['path'];  // Obtener solo el path sin los parámetros
$search = isset($_GET['search']) ? $_GET['search'] : '';
$viewDir = __DIR__ . '/views/';  // Carpeta de vistas


error_log('' . $viewDir . '|' . $search .'|' . $request . '|');

// Rutas que no requieren autenticación
$publicRoutes = [
    '/login',
];

// Verificar si el usuario está autenticado
if (!in_array($path, $publicRoutes) && empty($_SESSION['user_id'])) {
    // Redirigir al login si no hay sesión activa y la ruta no es pública
    header('Location: /login');
    exit;
}

// Enrutamiento basado en el path
switch ($path) {
    // Páginas principales
    case '':
    case '/':
        require $viewDir . 'home.php';
        break;

    // Login
    case '/login':
        require $viewDir . 'login.php';
        break;

    // Logout
    case '/logout':
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;

    // Search (búsqueda general)
    case '/search':
        require $viewDir . 'search.php';
        break;

    // Rutas para usuarios (CRUD)
    case '/user/insert':
        require $viewDir . 'user/insert.php';
        break;
    case '/user/select':
        require $viewDir . 'user/select.php';
        break;
    case '/user/update':
        require $viewDir . 'user/update.php';
        break;
    case '/user/delete':
        require $viewDir . 'user/delete.php';
        break;

    // Rutas para carreras (CRUD)
    case '/career/insert':
        require $viewDir . 'career/insert.php';
        break;
    case '/career/select':
        require $viewDir . 'career/select.php';
        break;
    case '/career/update':
        require $viewDir . 'career/update.php';
        break;
    case '/career/delete':
        require $viewDir . 'career/delete.php';
        break;

    // Rutas para universidades (CRUD)
    case '/university/insert':
        require $viewDir . 'university/insert.php';
        break;
    case '/university/select':
        require $viewDir . 'university/select.php';
        break;
    case '/university/update':
        require $viewDir . 'university/update.php';
        break;
    case '/university/delete':
        require $viewDir . 'university/delete.php';
        break;

    // Página 404 en caso de ruta no encontrada
    default:
        http_response_code(404);
        require $viewDir . '404.php';
        break;
}
?>
