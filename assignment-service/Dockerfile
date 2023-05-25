FROM php:7.4-apache

# Install necessary PHP extensions and tools
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Copy the application code
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/