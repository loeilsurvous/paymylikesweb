FROM php:8.2-fpm
LABEL maintainer="Sadialiou Diallo"

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

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure the installation of pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd \
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

EXPOSE 9000