# Setting up the project on windows & mac
Setting up Laravel on both Windows and macOS involves similar steps, but there are some platform-specific differences in the setup process. Laravel is a PHP web application framework, and it requires a web server and PHP to run. Here are the general steps to set up Laravel on both Windows and macOS

## Prerequisites:

### Composer: 
Composer is a PHP package manager that Laravel uses for managing its dependencies. You'll need to install Composer.

PHP: Make sure you have PHP installed. Laravel requires PHP 8.1 or later.

### Web Server: 
You can use Apache, Nginx, or the built-in PHP development server. Laravel's built-in development server is suitable for development, but for production, it's recommended to use a full-fledged web server like Apache or Nginx.

### Database:
 Laravel supports various databases like MySQL, PostgreSQL, SQLite, and SQL Server. Make sure you have your preferred database system installed and configured.

## Instructions for Windows:

### Install PHP:
Download PHP for Windows from the official PHP website ['Php-for-windows'](https://windows.php.net/download/).
Follow the installation instructions to install PHP.

### Install Composer:
Download and install Composer for Windows from the official website  ['Composer-for-windows'](https://getcomposer.org/download/).



## Instructions for macOS:

### Install PHP:
1, macOS comes with PHP preinstalled. You can check the installed version using the following command:
php -v
You may need to install additional PHP extensions depending on your project's 
requirements.

 * if php is not found
    download php and install php, it should be global
    ['Php-for-macOS'](https://daily-dev-tips.com/posts/installing-php-on-your-mac/)

2, Install Composer:
You can install Composer on macOS using Homebrew:

brew install composer


NOTE :
>  FOR YOUR PC TO BE ABLE TO IDENTIFY PHP OR COMPOSER, YOU NEED TO SET UP PHP IN YOUR   SYSTEM ENVIROMENT VARIABLE
    for windows : https://www.delftstack.com/howto/php/php-environment-variable/
    for mac : https://youngstone89.medium.com/setting-up-environment-variables-in-mac-os-28e5941c771c

# Install Laravel project:

1, Open a command prompt or PowerShell window.
Run the following command to install Laravel globally:
composer global require laravel/installer


2, Run the following command to install Laravel globally:
 git clone https://github.com/emekaenyinnia/HNGx-stage-two.git

3, Create a new Env:
Copy the existing .env.example text and paste it in your newly created .env on your root folder :
HNGX-STAGE-TWO/.env

NOTE :
>  To run any command on Teminal with the word artisan, you need to be in the working directory
Run the following command
cd HNGX-STAGE-TWO

4, Configure your Database:
In the .env file you can configure your database with your database connection, databde host, database port , etc:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud-api
DB_USERNAME=root
DB_PASSWORD=

5, Running App key :
In laravel, the "app key" refers to a secret crytographic key used for various security and encryption purposes within your laravel application
Run the following command to generate your app key
php artisan key:generate

then paste the key generated in your .env file
APP_KEY=base64:13RKcRNf4dngSlIKiJ/t1fJ0alN/nF76LSOBHzfr8aE=

Start the project \
Run the following command
php artisan serve


# Introduction for testing the api:

The User Api is a RESFUL web service that allow a user to create, retrieve, update, and delete an account. It is straight forward and easy to consume

!. Create a new User 
Endpoint: Use an HTTP POST request to a dedicated user creation endpoint, 
https://hngx-stage-two-el3e.onrender.com/api,
Method : POST
Request body 
Send user information in the request body in a structured format, usually JSON. Include the data name as a string.
example :
{
    "name" : "david"
}

response 
{
    "status": "success",
    "data": {
        "name": "david",
        "updated_at": "2023-09-10T20:23:12.000000Z",
        "created_at": "2023-09-10T20:23:12.000000Z",
        "id": 16
    },
    "message": "account created successfully ",
    "status_code": 200
}


2. Get a Specific User by Name
Endpoint:https://hngx-stage-two-el3e.onrender.com/api/{user_id},
Method : GET
Request body
Just pass the username as a parameter 
eg
https://hngx-stage-two-el3e.onrender.com/api/18

response:
{
    "status": "success",
    "data": {
        "id": 16,
        "name": "david",
        "created_at": "2023-09-10T20:23:12.000000Z",
        "updated_at": "2023-09-10T20:23:12.000000Z"
    },
    "message": "user data retrieved successfully ",
    "status_code": 200
}


3. Update a Specific Task by Name

Endpoint: https://hngx-stage-two-el3e.onrender.com/api/18
Method : PUT
eg 
eg
https://hngx-stage-two-el3e.onrender.com/api/18

Request Body:
{
    "name" : "emeka",
}

response:
{
    "status": "success",
    "message": "user name updated successfully ",
    "status_code": 200
}



4. Delete a Specific User by Name

Endpoint:https://hngx-stage-two-el3e.onrender.com/api/18
Method: DELETE
eg
https://hngx-stage-two-el3e.onrender.com/api/18

Response:
{
    "status": "success",
    "message": "your account was deleted successfully",
    "status_code": 200
}