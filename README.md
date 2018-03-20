# JE-bearing

This project is an online training module created with Laravel. This application was specifically built for a part manufacturing company, called JE Bearings. The company had a complex, multi-step manufacturing workflow and needed a solution that would clarify the process into interactive and easily to follow steps.

## Require

Composer <https://getcomposer.org/doc/00-intro.md>

Laravel 5.6 <https://laravel.com/docs/5.6/installation>

## Clone Repo

To clone this project to a local repository, it is required using [Git](https://git-scm.com/). Follow instructions provided [here](https://git-scm.com/downloads) to install and configure Git.

## Deployment

After project cloned and all prerequisites installed, it is necessary running the command below in the root directory to deploy properly all development dependencies of this project:

```
composer update
```

Furthermore, it is necessary to import the database content to local application. It is possible to import it using PHPMyAdmin interface or via command line:

```
mysql -h localhost -u <user> -p <password> <database name> < db_jebearings.sql
```

## Create .env file

After importing database content to local database application, it is necessary to configure PHP credentials to connect to your database. Following the example of the <code>.env-example</code> on root folder, update the file with the appropriate database info for your OS.

## Update Config Files

Navigate to Config > database.php

And uncomment line 49 on Windows/Linux

```
//'unix_socket' => env('DB_SOCKET', ''),
```

Or uncomment line 50 for Mac OS
```
//'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',
```

# Run aplication

Start the artisan server in order to run the project. On terminal, from the root folder type:
```
php artisan serve
```
And navigate into http://localhost:8000/

# Compile SASS

Navigate inside public folder:
```
cd public
```

And run sass in terminal:
```
sass --watch css/sass:css
```

# Authors

* Barbara Bombachini - me - <https://github.com/bbombachini>
* Mauricio Silveira <https://github.com/maursilveira>
* Clara Marshall <https://github.com/claramarshall>


