#!/bin/sh

cd /var/www
echo "Running composer"

# composer global require hirak/prestissimo
# composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

php artisan optimize

/usr/bin/supervisord -c /etc/supervisord.conf
