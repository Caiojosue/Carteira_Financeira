# Usando imagem oficial do PHP com Apache
FROM php:8.2.27-apache

# Instalar dependências do sistema e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    curl \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo \
        pdo_mysql \
        zip \
    && apt-get clean

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho no container
WORKDIR /var/www/html

# Copiar os arquivos do projeto para dentro do contêiner
COPY . /var/www/html

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Expor a porta padrão do Apache
EXPOSE 80

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
