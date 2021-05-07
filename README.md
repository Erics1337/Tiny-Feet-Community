# Tiny Feet Climate Action Planning Toolkit PHP User Forums

## Uses traversymvc PHP micro-framework

PHP micro-framework created by [Brad Traversy](https://github.com/bradtraversy) through his udemy course.  Customized by me and developed in consideration of the [Tiny Feet CAP Toolkit project](https://www.tinyfeet.app) as submission for my cs_350 final project assignment.


### Features of the micro-framework:

* .htaccess files for URL re-routing
* Uses classes and class methods to handle url requests in the format URLROOT/className/methodName
* Data is passed between the controller and the view/model by means of an array $data
* Message banner flashing 

### Features of the site:

* Forum where site visitors can view feedback from their community about issues relating to climate action planning
** User registration and login functionality to gain access to the following:
*** Ability to create, update, and delete one's own posts, in a pre-defned set of topics 
*** View all user profiles and edit one's own

## Getting Started

Copy the files to your XAMPP, MAMP, or other web server application's htdocs folder, then follow the instructions below to use this app on your local machine.

### Config File

Modify the app/config/config.php file according to your needs.

```
//Database Configuration
define('DB_HOST', '<databaseHost>');
define('DB_USER', '<databaseUser>');
define('DB_PASS', '<databasePassword>');
define('DB_NAME', '<databaseName>');
// URL Root
define('URLROOT', 'http://<serverIP>:<serverPort><rootFolderName');
```

Default configuration for cs_350:

```
//Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'student');
define('DB_PASS', 'CS350');
define('DB_NAME', 'cs_350');
// URL Root (using MAMP)
define('URLROOT', 'http://localhost:8888/Tiny-Feet-Community');
```

### htaccess file

Modify the .htaccess file inside the public folder to match the name of your installation folder
(only need to do this if you change from the default folder name "Tiny-Feet-Community)

### Install the Database

Create a database called “cs_350” w/ username “student”, password “CS350” & import the data.sql file in it.

## Built With

* PHP + MySQL
* Bootstrap CSS 4.0 & Font Awesome Icons
* Bootswatch themes and Bootdey snippets

## License

This project is licensed under the MIT License