#!/bin/sh
set -e

# Copy public assets to shared volume for Nginx
cp -r /var/www/public/. /var/www/public-shared/

php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration

exec "$@"