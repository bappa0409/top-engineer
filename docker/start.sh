#!/usr/bin/env sh
set -e

php artisan key:generate --force || true
php artisan migrate --force || true
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
