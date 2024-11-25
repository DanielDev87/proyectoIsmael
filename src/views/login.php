<?php
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validar en la base de datos
    $stmt = $pdo->prepare(
        query: 'SELECT id, username, password FROM users '
        . 'WHERE username = :username'
    );
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Usuario autenticado correctamente
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header('Location: /');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>


<?php include 'headers.php'; ?>

<main class="form-signin w-100 m-auto">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="container py-3">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Por favor, inicia sesión</font></font></h1>
            
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
                <label for="floatingInput"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <label for="floatingPassword"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña</font></font></label>
            </div>
            
            <button class="btn btn-primary w-100 py-2" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Iniciar sesión</font></font></button>
            <p class="mt-5 mb-3 text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">©2024</font></font></p>
        </form>
</div>
</main>

<?php include 'footer.php'; ?>