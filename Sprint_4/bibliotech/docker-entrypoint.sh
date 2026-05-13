#!/bin/bash
set -e

# Generar APP_KEY si no existe
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --ansi
fi

# Esperar a que MySQL esté disponible (solo si DB_CONNECTION=mysql)
if [ "$DB_CONNECTION" = "mysql" ]; then
    echo "Esperando a MySQL en $DB_HOST:$DB_PORT..."
    until php -r "try { new PDO('mysql:host=$DB_HOST;port=$DB_PORT', '$DB_USERNAME', '$DB_PASSWORD'); echo 'OK\n'; } catch (Exception \$e) { exit(1); }" 2>/dev/null; do
        sleep 2
    done
    echo "MySQL listo."
fi

# Ejecutar migraciones automáticamente
php artisan migrate --force --ansi

# Ejecutar seeders si existe la variable SEED_DATABASE=true
if [ "$SEED_DATABASE" = "true" ]; then
    php artisan db:seed --force --ansi
fi

# Ejecutar el comando principal (apache2-foreground)
exec "$@"
