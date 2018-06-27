## Extended Resource Router

This helper extends the standard set of resource routing methods to work with SoftDeletes.

![extended-resource-router](https://user-images.githubusercontent.com/10347617/41983183-003ce8e0-7a36-11e8-9ef4-a3c587e6ec10.png)

<p align="center">
    <a href="https://styleci.io/repos/82566268"><img src="https://styleci.io/repos/82566268/shield" alt="StyleCI" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-resource-router"><img src="https://img.shields.io/packagist/dt/andrey-helldar/extended-resource-router.svg?style=flat-square" alt="Total Downloads" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-resource-router"><img src="https://poser.pugx.org/andrey-helldar/extended-resource-router/v/stable?format=flat-square" alt="Latest Stable Version" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-resource-router"><img src="https://poser.pugx.org/andrey-helldar/extended-resource-router/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
    <a href="LICENSE"><img src="https://poser.pugx.org/andrey-helldar/extended-resource-router/license?format=flat-square" alt="License" /></a>
</p>


## Installation

To get the latest version of `Extended Resource Router`, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require andrey-helldar/extended-resource-router
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "andrey-helldar/extended-resource-router": "^1.0"
    }
}
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

    Helldar\ExtendedResourceRouter\ServiceProvider::class,


Alright! Use `app('ext_router')` instance.


## Using

```php
app('ext_router')->apiResource('cars', 'CarsController');

// or

use Helldar\ExtendedResourceRouter\Routing\Router;

Router::apiResource('cars', 'CarsController');
```

The following routes will be registered:

| methods | url | name | controller |
| --- | --- | --- | --- |
| GET | cars | cars.index | MYAPP\Http\Controllers\CarsController@index |
| POST | cars/{car} | cars.store | MYAPP\Http\Controllers\CarsController@store |
| GET | cars/{car} | cars.show | MYAPP\Http\Controllers\CarsController@show |
| PUT | cars/{car} | cars.update | MYAPP\Http\Controllers\CarsController@update |
| DELETE | cars/{car} | cars.destroy | MYAPP\Http\Controllers\CarsController@destroy |
| POST | cars/{car} | cars.restore | MYAPP\Http\Controllers\CarsController@restore |
| GET | cars | cars.deleted | MYAPP\Http\Controllers\CarsController@deleted |


## Copyright and License

This package was written by Andrey Helldar, and is licensed under [The MIT License](LICENSE).


## Translation

Translations of text and comment by Google Translate.

Help with translation +1 in karma :)
