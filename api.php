<?php

$ciudad = $_GET['ciudad'];
$carrera = $_GET['carrera'];

$data = json_decode(file_get_contents('data/universidades.json'), true);
$resultados = array_filter($data, function ($universidad) use ($ciudad, $carrera) {
    return (stripos($universidad['ciudad'], $ciudad) !== false) &&
           (stripos($universidad['carrera'], $carrera) !== false);
});

header('Content-Type: application/json');
echo json_encode(array_values($resultados));
