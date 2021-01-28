#!/bin/sh
set -e

echo "Deploying application ..."

(
    ../start.sh 2 &&
    git fetch origin deploy &&
        git reset --hard origin/deploy &&
        composer install --no-interaction --prefer-dist --optimize-autoloader &&
        php artisan migrate:fresh &&
        php artisan optimize &&
        php artisan up &&
        sudo service apache2 restart &&
        chmod +x run_ws.sh && pm2 restart run_ws.sh &&
        echo "Application deployed!" &&
        ../done.sh 2
)

errorCode=$?
if [ $errorCode -ne 0 ]; then
    echo "We have an error" && ../error.sh 2

    exit $errorCode
fi
