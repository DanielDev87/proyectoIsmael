<!-- views/resultados.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>Resultados</h3>
        <div id="resultados"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const resultados = JSON.parse(localStorage.getItem('resultadosBusqueda')) || [];
            const contenedor = document.getElementById('resultados');

            resultados.forEach((universidad) => {
                const item = document.createElement('div');
                item.classList.add('card');
                item.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">${universidad.nombre}</h5>
                        <p class="card-text">Carrera: ${universidad.carrera}</p>
                        <p class="card-text">Precio: ${universidad.precio}</p>
                        <p class="card-text">Materias: ${universidad.materias.join(', ')}</p>
                        <p class="card-text">Becas: ${universidad.becas}</p>
                        <a href="${universidad.link}" target="_blank" class="btn btn-info">Página oficial</a>
                    </div>
                `;
                contenedor.appendChild(item);
            });
        });
    </script>
</body>
</html>
