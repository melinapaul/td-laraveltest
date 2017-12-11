# td-laraveltest
Take home test for Taylor Digital

*Melina Devaraj*


There is no need to run any SQL commands as everything is done via migrations. Please create an empty database in a MYSQL instance using:

`CREATE DATABASE DB_NAME`

Update connection details in the `.env` file and run the following commands in the project directory to install dependencies and create necessary tables:

`composer install`

`php artisan migrate`

`php artisan db:seed --class=ClientTableSeeder`
