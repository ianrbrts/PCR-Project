# Taskify Installation Instructions

### PHP and MySQL
* Ensure that you have PHP installed and inside your Windows path.
* Set up a MySQL server and find out what port it is running on. An easy setup tool is the [MySQL installer.](https://dev.mysql.com/downloads/installer/)
* In MySQL workbench, create a new connection to your MySQL server. Remember the username and password, and create a new database name. 

### Composer and PHP.ini
* Install [Composer](https://getcomposer.org/download/) and check your Windows path to make sure it applied correctly.
* Install Laravel through composer with `composer global require laravel/installer` in any directory.
* In the project directory, run `composer update`. (If errors come up here, make sure that your PHP.ini has the fileinfo extension and the mysql extension uncommented.) 

### .env databse setup
* In the project directory, open the .env file.
* Edit the .env file on line 10 through 15 with your MySQL database information(since .env files are not committed to GitHub, you may need to rename the .env.example file to just .env).
* Once your database inforamtion is correctly inputted, run `php artisan migrate` to get the required schema over to your database. 

### Running the website 
* If all other requirements have been satisfied, you can run the website by going into the project directory and running `php artisan serve` this will likely run the site on a localhost:8000 port.
