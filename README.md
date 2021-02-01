# INSTRUCTIONS

## 1) Download and install MySQL

MySQL is the database of choice for this application.If you already have a valid installation, skip this step.

## 2) Download and install XAMPP

XAMPP is specific for PHP development

Click on the Config button (above the Netstat button), click Service and Port Settings, head to the MySQL tab and change Main Port to 7331 and Service Name to 'mysql'

You will then need to configure your XAMPP MySQL service port to 7331. Click the config button, and select the my.ini file. There you will change
the port number to 7331. 

## 3) Install Composer

Composer is a dependency manager for PHP. Use the following link:

```
https://getcomposer.org/download/ 
```

## 4) Create the database:

Head to the php admin page (click on admin button for MySQL)

Create a new schema called: laravel (use this parameter => utf8mb4_unicode_ci)


Proceed to then start the MySQL server instance

## 5) Install Project Depenedencies

Using either your IDE terminal, or your OS CMD change directory into where the project repository resides and run the following:

To install project dependencies (libraries, packages, etc.)

```
composer install
```

To generate the .env file for the application.

Head to our project folder, and copy and paste the .env.example file and name it .env


## 6) Migrate models to database

Using either your IDE terminal, or your OS CMD change directory into where the project repository resides and run the following:

This will migrate all models to the database, creating the appropriate tables and columns, and initializing the database with initial records

```
php artisan key:generate
```

```
php artisan migrate

php artisan db:seed
```

## 7) Deploy the application

Again in the terminal or OS CMD, change directory into where the project repository resides and run the following:

```
php artisan serve
```

The application should now be delployed locally at the following address: http://127.0.0.1:8000

# ISSUES

The above instructions have been sucessfully performed from scratch on my local environment. Any problems you run into might stem
from you own environment, and you will be required to do some troubleshooting (aka. google it)


# RESOURCES

## Payment system API: 
https://dashboard.stripe.com/test/dashboard
Stripe account Information 
username:project.algonquin@gmail.com
password: project.algonquin@123

# TROUBLESHOOTING:

## How to resolve the memory space error when you try to install the cart library?

Replace it (128 to -1) in the php.ini inside xampp > php
Maximum amount of memory a script may consume (128MB)
http://php.net/memory-limit
memory_limit=-1
