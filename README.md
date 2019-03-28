## Background

PHP application using a framework Symfony 3 that will list all
the countries which speaks the same language or checks if given two countries speak the
same language by using open rest api: https://restcountries.eu/

## How to use 
1-) console by giving country name as parameter:
->php bin/console index.php --country1="Spain" 
[Output]
Country language code: es
Spain speaks same language with these countries: Uruguay, Bolivia, Argentina..

2-) In case of two parameters given, application should tell if the countries talking the same
language or not
->php bin/console index.php --country1="Spain" --country2="France"
[Output]
Spain and France do not speak the same language

## Run the project
### Setup
- `docker-compose up -d`

## Tests
- `docker-compose exec php vendor/bin/phpunit`
