FROM php:7.2-apache
WORKDIR /var/www/html/
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli

#подключаем модуль для апач для преобразования URL-ов
RUN a2enmod rewrite
# Перезапускаем сервер Apache
RUN service apache2 restart


