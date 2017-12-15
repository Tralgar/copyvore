# Copyvore Project

Application web en Symfony 4 (flex).
- Implémentation d'un back pour gérer les données nécessaires.
- Mise en place d'un front accessible aux clients afin d'accéder à leur données.

<br/>
### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

<br/>
### Prerequisites

You need a complete web environment to run the application, please install :

```
php7.1
apache2
mysql-server
git
composer
```

<br/>
### Installing

You need to create a database named 'copyvore', with phpmyadmin for example or db-common when you download & install mysql-server.

Then, go to your web development directory :
```
git clone https://github.com/Tralgar/copyvore.git
cd copyvore
composer install
```

<br/>
### Run It !

edit the copyvore/.env to change ids for database connection.

```
php bin/console server:run
```

If you have no error, you can now see the application on your web browser !
