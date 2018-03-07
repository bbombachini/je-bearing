# JE-bearing

This project is a learning module created with Laravel.

## Require
Composer installed - https://getcomposer.org/doc/00-intro.md
Laravel 5.6 - https://laravel.com/docs/5.6/installation

## Clone Repo
Clone repo, import database and on project folder run:
$ composer update

## Create .env file
Following the example of .env-example on root folder, update the file with the appropriate database info for your OS.

## Update Config Files
Navigate to Config > database.php

And uncomment line 49 on Windows 
//'unix_socket' => env('DB_SOCKET', ''),

Or uncomment line 50 for Mac OS or Linux
//'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',

# Run aplication

Start the artisan server in order to run the project. On terminal, from the root folder type:
$ php artisan serve
And navigate into http://localhost:8000/

# Compile SASS

Navigate inside public folder and then run in terminal:
$ sass --watch css/sass:css





