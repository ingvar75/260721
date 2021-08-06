FROM php:8.0.3-fpm

# Install modules
RUN apt-get update && apt-get install -y \
        libjpeg62-turbo-dev \
        libmagickwand-dev \
        libfreetype6-dev \
        openssh-client \
        libmcrypt-dev \
        libldap2-dev \
        libzmq3-dev \
        libonig-dev \
        libpng-dev \
        libzip-dev \
        libicu-dev \
        libpq-dev \
        imagemagick \
        uuid-dev \
        openssl \
        unzip \
        wget \
        curl \
        tar \
        zip \
        git \
        htop \
        net-tools \
            --no-install-recommends

RUN docker-php-ext-install zip intl mbstring pdo_mysql exif mysqli \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install gd

RUN pecl install imagick \
    && docker-php-ext-enable imagick

RUN pecl install -o -f xdebug \
    && rm -rf /tmp/pear

COPY ./php.ini /usr/local/etc/php/
COPY ./www.conf /usr/local/etc/php/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer

# Install phpunit
RUN wget https://phar.phpunit.de/phpunit-6.0.phar && \
        chmod +x phpunit-6.0.phar && \
        mv phpunit-6.0.phar /usr/local/bin/phpunit

RUN usermod -u 1000 www-data

VOLUME /root/.composer
WORKDIR /var/www

EXPOSE 9000

CMD ["php-fpm"]