## About This Project

This project is the Task Management System. Built with `Laravel` & various packages included.

## Setup

- First of all, we have to `clone` the project on our local machine using the below command
 ```
git clone https://github.com/spysabbir/laravel-task_management.git
``` 
- Now change the command line present working directory (pwd) by
 ```
cd laravel-task_management
``` 
- Now with the help of `composer` download all required packages that are needed to run this Laravel project
 ```
composer install
``` 
- Now, we need to copy the .env.example file as a .env file for our Laravel project. Use the below command to copy the file
 ```
cp .env.example .env
``` 
- Currently, our project does not have any key, we have generated it using
 ```
php artisan key:generate
``` 
- Basic setup is done at this point, now we have work on `.env`. The below changes should be done in the .env file

Variable Name | Description
--- | ---
*DB | database settings for connecting the database with this project
*MAIL | mail settings for sending email via SMTP server

- Now migrate the database using
 ```
php artisan migrate
``` 

- At last, we can now run the project using
 ```
php artisan serve
``` 
