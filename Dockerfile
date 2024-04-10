# Use the official PHP image as base
FROM php:7.4-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the src folder containing your PHP files to /var/www/html inside the container
COPY src/ /var/www/html/

RUN chmod -R 777 /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80