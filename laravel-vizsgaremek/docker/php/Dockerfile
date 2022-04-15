FROM php:8.0-fpm-alpine

WORKDIR /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk update && apk add --no-cache \
    make \
    autoconf \
    gcc \
    libc-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libpng-dev \
    imagemagick \
    imagemagick-dev \
    zip \
    libzip-dev \
    php8-pecl-imagick \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl \
    oniguruma-dev \
    libxml2-dev \
    vim \
    mysql-client \
    fish

RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-install gd
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install tokenizer
RUN pecl install imagick && docker-php-ext-enable imagick


CMD ["php-fpm"]
