FROM wordpress:6.5.5-fpm-alpine

# Copy project files to the container (adjust paths as necessary)
COPY . /var/www/html

# # Ensure the correct ownership
# RUN chown -R www-data:www /var/www/html

# RUN chown -R 82:82 /var/www/html/wp-content/

# Switch to the user that will run the application
USER www-data

# Any additional setup commands can go here
# RUN chown -R sina:sina /home/sina/Desktop/wordpress-project/hany
