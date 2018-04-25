#!/bin/bash

echo $PWD
cd /var/www/aditiontask/
echo $PWD
php database/db.php	
composer install --prefer-source