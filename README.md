# Laravel-5.4-Vue-Js-Backend
This is a backend created for vue js project that connect to it via an api. We are using API Authentication (Passport) for web tokens


### Introduction

We are creating a simple shop backend. This data is consumed using frontend framework, in our case we are using vue js. 

### How to use the project

- Clone the project from the rep.
- Run <b>composer update</b> on your terminal.
- Configure your database connection on .env
- Run the migration using <b>php artisan migrate</b>.
- To seed our products we need to use the following command: <b>php artisan db:seed</b>
- The last thing we need to do is to install passport. run the following command <b>php artisan passport:install</b>
