FROM php:8.1-fpm

RUN rm /etc/apt/preferences.d/no-debian-php
RUN apt-get update -y && apt-get install -y \
	git \
	curl \
	libpng-dev \
	libonig-dev \
	libxml2-dev \
	zip \
	unzip \
	libpq-dev \
	php-sockets 
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd sockets

COPY ./ /var/www/app
WORKDIR /var/www/app
RUN chown -R www-data:www-data /var/www
USER www-data
RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8000