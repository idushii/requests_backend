#!/bin/sh
set -e

cd ~/back && php artisan websockets:serve && ../logger.sh "start ws server"
