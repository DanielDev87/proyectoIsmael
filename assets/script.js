// assets/script.js

document.getElementById('formBusqueda').addEventListener('submit', async (event) => {
    event.preventDefault();
    const ciudad = document.getElementById('ciudad').value;
    const carrera = document.getElementById('carrera').value;

    const response = await fetch(`../api.php?ciudad=${ciudad}&carrera=${carrera}`);
    const resultados = await response.json();

    localStorage.setItem('resultadosBusqueda', JSON.stringify(resultados));
    window.location.href = 'resultados.php';
});
