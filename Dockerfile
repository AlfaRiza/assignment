FROM php:7.3-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
EXPOSE 80

RUN a2enmod rewrite
RUN chmod -R 755 /var/www/html
COPY ./ /var/www/html
RUN service apache2 restart
