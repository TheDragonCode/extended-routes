## Extended Routes

This helper extends the standard set of resource routing methods to work with SoftDeletes and other extends.

![extended routes](https://user-images.githubusercontent.com/10347617/42021379-1da20efa-7ac3-11e8-8f99-72e6728029fe.png)

<p align="center">
    <a href="https://styleci.io/repos/138897572"><img src="https://styleci.io/repos/138897572/shield" alt="StyleCI" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://img.shields.io/packagist/dt/andrey-helldar/extended-routes.svg?style=flat-square" alt="Total Downloads" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://poser.pugx.org/andrey-helldar/extended-routes/v/stable?format=flat-square" alt="Latest Stable Version" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://poser.pugx.org/andrey-helldar/extended-routes/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
    <a href="LICENSE"><img src="https://poser.pugx.org/andrey-helldar/extended-routes/license?format=flat-square" alt="License" /></a>
</p>


## Installation

To get the latest version of `Extended Routes`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require andrey-helldar/extended-routes
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "andrey-helldar/extended-routes": "^1.0"
    }
}
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

    Helldar\ExtendedRoutes\ServiceProvider::class,


## Using

```php
app('ext_route')->apiResource('cars', 'CarsController');

// or

ExtRoute::apiResource('cars', 'CarsController');
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

This package only expands the resource routing, inheriting from them. This means that using the instance of `app('ext_route')` you can work with any other routs.


## Copyright and License

This package was written by Andrey Helldar, and is licensed under [The MIT License](LICENSE).


## Translation

Translations of text and comment by Google Translate.

Help with translation +1 in karma :)
