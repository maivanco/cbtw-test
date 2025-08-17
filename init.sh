#!/bin/bash
set -e

WP_DIR="/var/www/html"
LOCAL_WP_DIR="/app/wp"

echo "🚀 [init.sh] Starting initialization..."

# Download WordPress into ./wp (host) if it's missing
if [ ! -f "$LOCAL_WP_DIR/wp-config-sample.php" ]; then
  echo "📥 Downloading WordPress 6.8.1 into ./wp on host..."
  mkdir -p "$LOCAL_WP_DIR"
  curl -o /tmp/wordpress.tar.gz https://wordpress.org/wordpress-6.8.1.tar.gz
  tar -xzf /tmp/wordpress.tar.gz -C /tmp
  cp -R /tmp/wordpress/* "$LOCAL_WP_DIR/"
  rm -rf /tmp/wordpress /tmp/wordpress.tar.gz
fi

# Set permissions
echo "🔐 Setting permissions..."
chown -R www-data:www-data "$WP_DIR"

# Start php-fpm
echo "🚀 Starting php-fpm..."
exec docker-entrypoint.sh php-fpm