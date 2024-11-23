<p align="center"><img src="/Users/macbookpro/Desktop/hotelSite/public/images/casabella.png" width="100"></p>

# Hotel Website project
A Laravel-based website for a hotel Casa Bella.

## Authors
- [bluePundit](https://bluepundit.eu) - Nico Deblauwe ([@ndeblauw](https://www.github.com/ndeblauw)) (Only at the start)
- Nikita Tsekhomskiy ([@NikoTaK](https://www.github.com/NikoTaK))

## Requirements
This project uses
- [Laravel 11](https://laravel.com/docs/11.x/releases)

## Environment Variables
Nothing but the normal ones

## Dev Installation instructions
- Create a directory for the project and cd into it
- Clone the project into this directory (`git clone https://github.com/NikoTaK/LaravelProject.git  .`)
- run `composer install`
- Create a .env for your dev environment: `cp .env.example .env` and adjust the settings (local domain, database, etc)
- Set the encryption key in the .env: `php artisan key:generate`
- if using sqlite: do execute `touch database/database.sqlite`
- and then migrate the tables: `php artisan migrate`
- and then seed date: `php artisan db:seed`.
