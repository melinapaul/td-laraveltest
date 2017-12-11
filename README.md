# td-laraveltest
Take home test for Taylor Digital

*Melina Devaraj*


There is no need to run any SQL commands to create tables as everything is done via migrations. You need a MYSQL Database. To create an empty database in a MYSQL instance, run the command:

`CREATE DATABASE db_name`

Update connection details in the `.env` file and run the following commands in the project directory to install dependencies and create necessary tables:

`composer install`

`php artisan migrate`

`php artisan db:seed --class=ClientTableSeeder`
