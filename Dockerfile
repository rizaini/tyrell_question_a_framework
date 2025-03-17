FROM php:8.2-fpm

# Install system dependencies for the intl extension
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Clean up to reduce image size
RUN apt-get clean && rm -rf /var/lib/apt/lists/*