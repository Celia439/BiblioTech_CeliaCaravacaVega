# Imagen base con PHP 8.2 y Apache
FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones PHP necesarias para Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite de Apache (necesario para Laravel)
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Crear .env desde el ejemplo si no existe (el .env real está en .dockerignore)
RUN cp .env.example .env

# Instalar dependencias PHP (sin dev, optimizado para producción; quitar --no-dev si es entorno local)
RUN composer install --optimize-autoloader --no-interaction

# Limpiar caché de Laravel que pudiera venir del entorno local
RUN rm -f bootstrap/cache/*.php

# Instalar dependencias Node y compilar assets con Vite
RUN npm install && npm run build

# Permisos de Laravel (storage y bootstrap/cache deben ser escribibles)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Configurar Apache para que apunte a /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Puerto expuesto
EXPOSE 80

# Script de entrada para preparar Laravel al arrancar el contenedor
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
