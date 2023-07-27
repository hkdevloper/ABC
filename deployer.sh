set -e

echo "Deploying to Application"
echo "========================"

# Get the current version
VERSION=$(cat version/version)

# Entering to maintenance mode
(php artisan down --message "The application is being updated, please wait a few minutes" --retry=60) || true

    # update codebase
    git pull origin master --tags

    # update PHP dependencies
    composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

    # update database/migrations
    php artisan migrate --force

    # clear cache
    php artisan cache:clear

    # clear config cache
    php artisan config:cache

# Exit maintenance mode
php artisan up

echo "Application successfully deployed!"
