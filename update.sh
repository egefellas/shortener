#!/bin/bash

git pull origin master
npm install
npm run prod
php artisan migrate
php artisan queue:restart