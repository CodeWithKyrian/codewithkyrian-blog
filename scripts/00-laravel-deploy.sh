#!/usr/bin/env bash
echo "Running composer"
composer install --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:fresh --force

echo "Running seeder..."
php artisan db:seed --class=ProductionSeeder --force

echo "Optimizing Filament..."
php artisan filament:optimize
