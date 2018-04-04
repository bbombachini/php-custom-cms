# CMS Movie App
Simple CMS created with PHP to allow users to create, read, update and delete content for a Movie App.

## Getting Started
Git clone the repo inside your /htdocs folder on OSX or inside /www folder on Windows.

`git clone <repo-url> <folder-name>`

Install the db_videoapp.sql file that is inside `/db` folder on your local MAMP/WAMP/LAMP or through terminal:

`mysql -h localhost -u <user> -p <password> <database name> < db_videoapp.sql`

Use the `connect-example.php`to create a connect.php file with proper settings to connect to your local server.

## Run Grunt
Grunt is being used in this project to optimize images and compile sass and javascript. On terminal, on your root folder, run grunt with:

`grunt`

## Versioning
Git was used as a version control system since the beginning.

## Author
+ Barbara Bombachini - *http://www.bbombachini.com*

## Build with
PHP
GIT
MAMP

This project uses php and sass to run a login page and allow users in and out. Checking their passwords and locking them out after 3 failed attempts.

## License
This project is licensed under the MIT License - see the LICENSE.md file for details
