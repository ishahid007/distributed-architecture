FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo_mysql bcmath sockets pcntl
RUN apt-get update && apt-get install -y nano wget git

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

WORKDIR /var/www/html/financial

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

WORKDIR /var/www/html/order

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

WORKDIR /var/www/html/warehouse

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

WORKDIR /var/www/html

CMD ["apache2-foreground"]
