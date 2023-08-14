FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip libzip-dev \
    unzip libpq-dev

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev 
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure the installation of pgsql
RUN docker-php-ext-configure gd --enable-gd  --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
        zip   sockets

# Get latest Composer
COPY --from=composer:2.2.16 /usr/bin/composer /usr/bin/composer


# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $use

COPY composer*  /var/www/


RUN composer install --no-autoloader

COPY . .

RUN composer dump-autoload -o

EXPOSE 8001