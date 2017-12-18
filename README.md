# Copyvore Project

Application web en Symfony 4 (flex).
- Implémentation d'un back pour gérer les données nécessaires.
- Mise en place d'un front accessible aux clients afin d'accéder à leur données.

### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You need a complete web environment to run the application, please install :

First of all : php 7.1.x. You need to add a repo :
```
sudo apt-get install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
```
Then, install php 7.1 and modules :

```
sudo apt-get install php7.1 php7.1-cli php7.1-common php7.1-json php7.1-opcache php7.1-mysql php7.1-mbstring php7.1-mcrypt php7.1-zip php7.1-fpm
```
If there's some errors, please check https://www.rosehosting.com/blog/install-php-7-1-with-nginx-on-an-ubuntu-16-04-vps/

If everything is OKAY install :
```
sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install git
sudo apt-get install composer
```

### Installing

You need to create a database named 'copyvore'. I recommend using phpmyadmin :
```
sudo apt-get install phpmyadmin
```
Create a database with dbconfig-common when you download & install phpmyadmin.

Then, go to your web development directory :
```
git clone https://github.com/Tralgar/copyvore.git
cd copyvore
composer install
```

### Run It !

Edit the copyvore/.env file to change ids and url for database connection.

```
php bin/console server:run
```

If you have any errors, please check http://symfony.com/doc/current/setup.html#troubleshooting-the-requirements-checker <br>
If not, you can now see the application on your web browser !

