# Usar una imagen base de PHP con Apache
FROM php:8.0-apache

# Habilitar mod_rewrite para Apache
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# Establecer el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copiar el código fuente y el archivo composer.json
COPY ./src /var/www/html

# Configurar Apache para que sirva desde la raíz correcta
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Exponer el puerto 80
EXPOSE 80
