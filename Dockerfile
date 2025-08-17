FROM wordpress:6.8.1-fpm

ARG ENABLE_XDEBUG=true

RUN apt-get update && apt-get install -y unzip curl


# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && php wp-cli.phar --info \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Install Xdebug conditionally
RUN if [ "$ENABLE_XDEBUG" = "true" ]; then \
      pecl install xdebug && docker-php-ext-enable xdebug && \
      echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
      echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
      echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini && \
      echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini && \
      echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini && \
      echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini ; \
    fi



COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

ENTRYPOINT ["/usr/local/bin/init.sh"]