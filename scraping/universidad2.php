<?php

require 'vendor/autoload.php';
use Goutte\Client;

$client = new Client();
$crawler = $client->request('GET', 'https://universidad2.edu.co/programas');

$programas = [];
$crawler->filter('.programa-clase')->each(function ($node) use (&$programas) {
    $programas[] = [
        'nombre' => 'Universidad 2',
        'carrera' => $node->filter('.nombre')->text(),
        'precio' => $node->filter('.precio')->text(),
        'materias' => explode(", ", $node->filter('.materias')->text()),
        'becas' => $node->filter('.becas')->text(),
        'link' => $node->filter('a')->attr('href'),
        'ciudad' => 'Medellín',
        'sedes' => ['Sede Principal']
    ];
});

file_put_contents('../data/universidades.json', json_encode($programas));
