FROM php:7.4.33-apache

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable mod_rewrite 
RUN a2enmod rewrite

# apache2 default configuration
COPY ./apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# Copy application files to the default working directory
COPY ./cake-php .

# Create a tmp directory if doesn't exist
RUN mkdir -p ./app/tmp

# Make that directory accessible by web server
RUN chown -R www-data:www-data ./app/tmp
