# Acadewy

## Installation

Download the code from github

`
git clone git@github.com:marcu/acadewy.git
cd acadewy
`

Get composer.phar (see http://getcomposer.org)

`
curl -sS https://getcomposer.org/installer | php
`

Install the dependencies

`
php composer.phar install
`

Create the db configuration file and edit it

`
cp .env.local.php.dist .env.local.php 
`

Create the db

`
php artisan migrate:install
php artisan migrate
`

Serve

`
php artisan serve
`