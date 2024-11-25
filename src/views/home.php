<?php include 'headers.php'; ?>
<?php include 'navbar.php'; ?>



    <div class="container py-3">
        <h1>¡Bienvenido! Nos alegra tenerte de visita</h1>
        <p>Este es el lugar correcto para facilitar la eleccion de tu futuro.</p>
        
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm h-100">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Careras</h4>
                    </div>
                    <div class="card-body">
                        <font style="vertical-align: inherit;">Descripcion general de la carrera que deseas</font>
                    </div>
                    <div class="card-footer">
                        
                        <a href="career/select" class="w-100 btn btn-lg btn-primary mt-auto">Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm h-100">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Universidades</h4>
                    </div>
                    <div class="card-body">
                        <font style="vertical-align: inherit;">Encuentra datos esenciales, ya teniendo tu carrera deseada, para tener mayor comodidad a la hora de escoger tu univercidad</font>
                    </div>
                    <div class="card-footer">
                        <a href="university/select" class="w-100 btn btn-lg btn-primary mt-auto">Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm h-100">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Usuario</h4>
                    </div>
                    <div class="card-body">
                        <font style="vertical-align: inherit;">Ingresa tus datos para poder navegar por esta plataforma</font>
                    </div>
                    <div class="card-footer">
                        <a href="user/select" class="w-100 btn btn-lg btn-primary mt-auto">Gestionar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>