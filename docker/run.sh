#!/bin/sh

cd /var/www

php artisan optimize

/usr/bin/supervisord -c /etc/supervisord.conf
