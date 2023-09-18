# Try My Ride Web

Prueba Tecnica

## Requisitos Previos e Instalación (Con Docker)

Asegúrate de tener instalados los siguientes requisitos previos antes de comenzar:

* Docker Desktop
* WSL 2 (Virtual Machine)
* Distribucion Ubuntu (Instalado desde Microsoft Store, en caso de estar en Windows)
* Crear el contenedor con los siguientes archivos:
    1. docker-compose.yml:
        ```
            version: '3'
            services:
              php:
                build:
                  context: .
                  dockerfile: Dockerfile
                ports:

                  - 8000:80
              phpmyadmin:
                image: phpmyadmin
                ports:

                  - 8080:80
                depends_on:

                  - php
                environment:

                  - PMA_HOST=host.docker.internal

    2. Dockerfile:
          ```
              FROM php:apache

              RUN apt-get update && \

                  apt-get install -y zlib1g-dev libzip-dev \
                  git \
                  zip \
                  libonig-dev \
                  libxml2-dev \
                  libgd3 \
                  libgd-dev \
                  curl \
                  nano

              RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache gd zip mysqli

              RUN a2enmod rewrite

              RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php'); " && \

                  php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
                  php -r "unlink('composer-setup.php');"

              RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

              RUN apt-get install -y cron

              RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \

                  sed -i 's|AllowOverride None|AllowOverride All|' /etc/apache2/apache2.conf

              WORKDIR /var/www/html

              EXPOSE 80

              CMD ["apache2-foreground"]
* Crear una base de datos en MySQL llamada "**trymyride**"
* Ingresar al contenedor con: "**docker exec -it ID_DEL_CONTENEDOR bash**"
* Clonar el proyecto en "**/var/www/html**" con el comando: "**git clone https://github.com/DeveloperFabian/trymyride.git .**"
* Configurar el archivo de entorno "**.env**" con: "**DB_HOST=host.docker.internal**"
* Ejecutar los siguientes comandos:
  ```
      composer udpate --prefer-dist --optimize-autoloader
      php artisan key:generate --ansi
      php artisan storage:link
      php artisan migrate:fresh --seed
      npm install
      npm run dev
      chmod -R 777 vendor
      chmod -R 777 bootstrap
      chmod -R storage
      php artisan optimize:clear

## Requisitos Previos e Instalación (Sin Docker)

Asegúrate de tener instalados los siguientes requisitos previos antes de comenzar:

* Xampp o Laragon
* PHP 8.2
* Ultima version de NodeJS
* Ultima version npm
* MySQL 8.0
* Ultima version Composer
---
* Crear una base de datos en MySQL llamada "**trymyride**"
* Clonar el proyecto: "**git clone https://github.com/DeveloperFabian/trymyride.git .**"
* Ejecutar los siguientes comandos:
  ```
      composer udpate --prefer-dist --optimize-autoloader
      php artisan key:generate --ansi
      php artisan storage:link
      php artisan migrate:fresh --seed
      npm install
      npm run dev
      php artisan optimize:clear
      php artisan serve

## Tecnologías Utilizadas

* Laravel
* Spatie Permissions
* Spatie Media
* Laravel Fortify
* Laravel Lang
* Axios
* Vite
* NodeJS
