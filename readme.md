# Project Title

Test-Project - Admin Backend to manage companies/employees (Laravel 5.6)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.


### Installing

copy .env.example to .env and setup database and mailtrap
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testproject
DB_USERNAME=root
DB_PASSWORD=
```

setup mailtrap
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=YOUR_USERNAME
MAIL_PASSWORD=YOUR_PASSWORD
MAIL_ENCRYPTION=null
```
Step - 1

```
Navigate to project directory and run following command

composer install
```

Step - 2

```
php artisan migrate
```

Step - 3

```
php artisan db:seed

```

step - 4

```
php artisan storage:link

```

# Ready to access TEST LOGIN

```
Email : admin@admin.com
Password : password

```


## Built With

Laravel 5.6

## Contributing

## Versioning

## Authors

Vinod Kate

## License

none
