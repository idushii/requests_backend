#!/bin/sh
set -e

echo "Deploying application ..."

(
    git fetch origin deploy &&
        git reset --hard origin/deploy &&
        composer install --no-interaction --prefer-dist --optimize-autoloader &&
        php artisan migrate --force &&
        php artisan optimize &&
        php artisan up &&
        sudo service apache2 restart &&
        echo "Application deployed!" &&
        ../done.sh 2
)

errorCode=$?
if [ $errorCode -ne 0 ]; then
    echo "We have an error"

    exit $errorCode
fi
