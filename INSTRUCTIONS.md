# HelloFresh Senior Backend Developer Test

*While creating this assignment, my focus was on doing things the best possible way with given constraints in mind. So, I really haven't foused on completing assignment by number of functionalities but with the best possible approach, tools & plugins availble.*

*The most interesting part for me was defining [clean code architecture](#clean-code-architecture)*

### *All changes now merged in develop branch now*

## Basic Details & instructions

- Since I had some other serivce running on `80` port, I've made chage in `docker-compose.yml` to run nginx on `82` port, so the application will be accessible on `http://localhost:82` url. You can find it on develop branch.
- **Composer Install** - If you have composer installed on your local you can directly do `composer install` else can use my docker image script `cd web && bash composer_update.sh`.
- **DB Migrations** - Short command `bash migrate.sh` or ssh into php container & `run phpmig migrate` command
- **Unit Test** - To Run Unit tests use `composer test` or use `bash phpunit.sh`
- **API DOC** - You can access swagger API doc on `http://localhost:82/doc/index.html` URL
- `GET` API with search, pagination all in this eample - [http://localhost:82/recipes?search=K&orderBy=id&orderDirection=desc&offset=0&limit=3](http://localhost:82/recipes?search=K&orderBy=id&orderDirection=desc&offset=0&limit=3)

## Clean code architecture

- I've followed [Clean Code Architecture in PHP](https://leanpub.com/cleanphp) by [Kristopher Wilson](https://leanpub.com/u/kristopherwilson). (A [free](https://phutai.me/wp-content/uploads/2016/10/The-Clean-Architecture-in-PHP-Kristopher-Wilson.pdf) version)
- Bellow are few concepts I've focused & followed while building this architecture
    - SOLID Principles
    - The Onion Architecture
    - Factory Pattern & Static Factories
    - Adapter Pattern
    - Repository Pattern
- The main benefit of having this kind of architecture is to keep your core business logic testable

## Functionalities covered

- **Recipes** CURD REST API
- Search on **GET Recipes** API
- Order results on **GET Recipes** API
- Limit & paginate results on **GET Recipes** API
- **API key** based authentication for closed API's
- Documented API's using [Swagger](https://swagger.io/) 
- Few Unit Tests using **PHP Unit**

## Resources/plugins used

- [patricklouys/http](https://packagist.org/packages/patricklouys/http) - Simple, independent HTTP component
- [nikic/fast-route](https://packagist.org/packages/nikic/fast-route) - Simple, minimal & fast request router in PHP
- [rdlowrey/auryn](https://packagist.org/packages/rdlowrey/auryn) - A dependency injector for bootstrapping object-oriented PHP applications
- [filp/whoops](https://packagist.org/packages/filp/whoops) - Error handling
- [league/fractal](https://packagist.org/packages/league/fractal) - A package to handle data to make it ready for standard API output
- [davedevelopment/phpmig](https://packagist.org/packages/davedevelopment/phpmig) - Simple database migration system in PHP
- [gabordemooij/redbean](https://packagist.org/packages/gabordemooij/redbean) - A micro ORM for PHP
- [phpunit/phpunit](https://packagist.org/packages/phpunit/phpunit) - Testing framework

## Improvements needed
- Need to added rating API, but now it can be done like any of the above API
- We can have any strong authentication mechanism in place