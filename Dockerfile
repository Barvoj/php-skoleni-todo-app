FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git && \
    git config --global user.email "you@example.com" && \
    git config --global user.name "You"

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

# Install symfony cli
RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Set working directory
WORKDIR /var/www/html

# Expose PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
