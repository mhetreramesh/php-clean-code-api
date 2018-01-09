# HelloFresh Senior Backend Developer Test

## Changes made to core
- Since I had some other serivce running on `80` port, I've made chage in `docker-compose.yml` to run nginx on `82` port, so the application will be accessible on `http://localhost:82` port. You refer it on develop branch.
- **Composer Install** - If you have composer installed on your local you can directly do `composer install` else can use my docker image script `cd web && bash composer_update.sh`.
- **DB Migrations** - 
- **Unit Test** - To Run Unit tests use `composer test` or use `bash phpunit.sh`


## Functionalities covered

- **Recipes** CURD REST API
- Search on **GET Recipes** API
- Order results on **GET Recipes** API
- Limit & paginate results on **GET Recipes** API
- **API key** based authentication for closed API's
- Documented API's using [Swagger](https://swagger.io/) 
- Written Unit Tests using **PHP Unit**

## Resources/plugins used

- [patricklouys/http](https://packagist.org/packages/patricklouys/http) - Simple, independent HTTP component
- [nikic/fast-route](https://packagist.org/packages/nikic/fast-route) - Simple, minimal & fast request router in PHP
- [rdlowrey/auryn](https://packagist.org/packages/rdlowrey/auryn) - A dependency injector for bootstrapping object-oriented PHP applications
- [filp/whoops](https://packagist.org/packages/filp/whoops) - Error handling
- [league/fractal](https://packagist.org/packages/league/fractal) - A package to handle data to make it ready for standard API output
- [davedevelopment/phpmig](https://packagist.org/packages/davedevelopment/phpmig) - Simple database migration system in PHP
- [gabordemooij/redbean](https://packagist.org/packages/gabordemooij/redbean) - A micro ORM for PHP
- [phpunit/phpunit](https://packagist.org/packages/phpunit/phpunit) - Testing framework