Prerequisite

    1.PHP >= 7.2 (https://www.php.net/downloads)
    2.Composer (https://getcomposer.org/)

Config And Installation

    1.Clone this project
    2.Install PHP Dependencies: Composer install
    3.Copy env.example to .env and modify to your local configuration. Do not modify database name.
    4.run `php artisan:key generate`
    5.run `php artisan migrate`
    6.run `php artisan db:seed`

Running app for development mode

    1. run `php artisan:server --port=8000`
    
** If you have problem to run this project please contact me at zikriakmale@gmail.com 

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
