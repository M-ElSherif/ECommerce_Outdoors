## How to create a local environment to work with this project
## First, install componser using the link below:
https://getcomposer.org/download/
Composer it is a dependency manager for PHP.


## Now the next steps it is a suggestion from previous team. Please, follow the steps to run the project locally.
## We used xampp + MySQL from second term. So please use it.
##
## Please, in your PC choose a directory and create a new folder (anyName)
## Open CMD in the same level of your folder "anyName". Type the command line below and press Enter:
composer create-project --prefer-dist laravel/laravel anyName

## The installation need to start, and after processed inside the anyName folder must contain a Laravel structure. If it is not, you know what to do, StackOverFlow ;)

## Well, once you have the structure of the project created please copy the content of this project and paste inside anyName folder replacing all.

## Now, open CMD inside the anyName folder. We need to make some intallation to run the project.
## Install cart:
composer require hardevine/shoppingcart

composer require cartalyst/stripe-laravel

## Install Laravel UI to use log in and register functions:
composer require laravel/ui

## Install Stripe on it:
composer require stripe/stripe-php

## We have used the stripe to figure out the payment system, it is up to you change it.
https://stripe.com/docs/stripe-js

## After all the installation, you are supposed to run the project: Open CDM inside anyName folder and type:
php artisan serve

The project will run in http://127.0.0.1:8000

## If it is not, you know what to do: StackOverFLow ;)

## Let's create your database, please go to your database: 
http://localhost:7331/phpmyadmin/

Create a new schema called: Laravel (use this parameter => utf8mb4_unicode_ci)

## Now open your CMD inside the project folder (anyName) and type:
php artisan migrate

php artisan db:seed

## Alright, your development environment is done. My suggest is use the Visual Studio Code, and create a git repository to 
## control all the version. Below there are some credentials to be used in the project.

## Project email:
project.algonquin@gmail.com
pass: Team@123

## https://www.heroku.com/
username: project.algonquin@gmail.com
password: algonquin@123

## API use for payment system for the project: 
## https://dashboard.stripe.com/test/dashboard
## Stripe account: username:project.algonquin@gmail.com
## password: project.algonquin@123

## SOME PROBLEMS THAT WE HAD DURING THE PROJECT:
## Do you remember how do you resolve the memory space error when you try to install the cart library?
## just replace it (128 to -1) in the php.ini inside xampp > php
## Maximum amount of memory a script may consume (128MB)
## http://php.net/memory-limit
## memory_limit=-1
