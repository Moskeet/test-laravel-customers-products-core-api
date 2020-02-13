# Core\Api Package
##Installation
Add this lines to your **composer.json**
```php
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:moskeet/test-laravel-customers-products-core-api.git"
        }
    ],
```
Write this in root directory your project
```shell
composer require core\api
```
Add this lines to your **config/app.php**
```php
'providers' => [
        /* ~ */
        /*
         * Package Service Providers...
         */
        Core\Api\ApiServiceProvider::class,
        /*
       ],
```
Write this command
```shell
php artisan vendor:publish --provider="Core\Api\ApiServiceProvider"
```
