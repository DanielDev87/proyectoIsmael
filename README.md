# U.F (University finder).Buscador de Universidades

Esta aplicación permite a los usuarios buscar universidades en Medellín que ofrezcan programas específicos. Los resultados incluyen información sobre las materias, el precio, becas y enlaces directos a las páginas oficiales de las universidades.

## Requisitos
- PHP
- Composer (para instalar Goutte u otras librerías de scraping)

## Instalación
1. Clona el repositorio en tu servidor local.
2. Ejecuta `composer install` en la carpeta `scraping` para instalar Goutte.
3. Ejecuta los scripts de scraping para llenar `universidades.json`.

## Uso
- Accede a `views/index.php` para buscar universidades por ciudad y carrera.
- Los resultados se almacenan temporalmente en `localStorage` y se muestran en `views/resultados.php`.


#Cel 3108470118 
