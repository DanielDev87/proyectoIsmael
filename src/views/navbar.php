<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><font style="vertical-align: inherit;">University Finder</font></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Cambiar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        Carreras
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="static">
                        <li><a class="dropdown-item" href="career/select">Listar</a></li>
                        <li><a class="dropdown-item" href="career/insert">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        Universidades
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="static">
                        <li><a class="dropdown-item" href="university/select">Listar</a></li>
                        <li><a class="dropdown-item" href="university/insert">Crear</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        Usuarios
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="static">
                        <li><a class="dropdown-item" href="user/select">Listar</a></li>
                        <li><a class="dropdown-item" href="user/insert">Crear</a></li>
                    </ul>
                </li>
            </ul>
            <span class="navbar-text">
                ¡Hola! que bueno verte de nuevo
                <a href="/logout" class="ms-2 text-decoration-none">Cerrar sesión</a>
            </span>
        </div>
    </div>
</nav>