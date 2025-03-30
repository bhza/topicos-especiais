FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && apt-get clean

# Baixar e instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

RUN apt-get update && apt-get -y install libzip-dev unzip
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring 
RUN docker-php-ext-install exif 
RUN docker-php-ext-install pcntl 
RUN docker-php-ext-install bcmath 
RUN docker-php-ext-install gd

WORKDIR /var/www/crude

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

EXPOSE 8000
