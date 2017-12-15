# Copyvore Project

Application web en Symfony 4 (flex).
- Implémentation d'un back pour gérer les données nécessaires.
- Mise en place d'un front accessible aux clients afin d'accéder à leur données.

### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You need a complete web environment to run the application, please install :

```
php7.1
apache2
mysql-server
git
composer
```

### Installing

You need to create a database named 'copyvore', with phpmyadmin for example or db-common when you download & install mysql-server.

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

