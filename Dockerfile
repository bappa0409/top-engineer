FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy application
COPY . .

# Install PHP extensions if needed
RUN apk add --no-cache php82-pdo php82-pdo_mysql php82-pdo_pgsql

# Permissions
RUN chown -R nginx:nginx storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

ENV WEBROOT=/var/www/html/public

CMD ["/start.sh"]
