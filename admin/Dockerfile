FROM php:7.4-apache

# Install required PHP extensions and dependencies
RUN docker-php-ext-install mysqli pdo_mysql bcmath sockets pcntl
RUN apt-get update && apt-get install -y nano wget git

# Install curl if needed
RUN apt-get install -y curl

# Enable Apache Rewrite module
RUN a2enmod rewrite

# Copy the application code
COPY . /var/www/html/

# Copy the .htaccess file
COPY .htaccess /var/www/html/.htaccess

# Set the working directory
WORKDIR /var/www/html/