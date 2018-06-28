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

If you don't use auto-discovery, add the ServiceProvider to the `providers` array in `config/app.php`:

    Helldar\ExtendedRoutes\ServiceProvider::class,


## Using

Add to your `app/Http/Kernel.php` next code:

```php
protected function dispatchToRouter()
{
    $this->router = $this->app['router'];

    $this->registerMiddlewareGroups();
    $this->registerMiddleware();

    return parent::dispatchToRouter();
}

protected function registerMiddlewareGroups()
{
    foreach ($this->middlewareGroups as $key => $middleware) {
        $this->router->middlewareGroup($key, $middleware);
    }
}

protected function registerMiddleware()
{
    foreach ($this->routeMiddleware as $key => $middleware) {
        $this->router->aliasMiddleware($key, $middleware);
    }
}
```

Alright! This package override a default `router` helper.

```php
app('router')->apiResource('marks', 'CarsController');

// or

Route::apiResource('cars', 'CarsController');
```

The following routes will be registered:

| methods | url | name | controller |
| --- | --- | --- | --- |
| GET | marks | marks.index | MYAPP\Http\Controllers\CarsMarksController@index |
| POST | marks/{mark} | marks.store | MYAPP\Http\Controllers\CarsMarksController@store |
| GET | marks/{mark} | marks.show | MYAPP\Http\Controllers\CarsMarksController@show |
| PUT | marks/{mark} | marks.update | MYAPP\Http\Controllers\CarsMarksController@update |
| DELETE | marks/{mark} | marks.destroy | MYAPP\Http\Controllers\CarsMarksController@destroy |
| POST | marks/{mark}/restore | marks.restore | MYAPP\Http\Controllers\CarsMarksController@restore |
| GET | marks/deleted | marks.deleted | MYAPP\Http\Controllers\CarsMarksController@deleted |
| GET | cars | cars.index | MYAPP\Http\Controllers\CarsController@index |
| POST | cars/{car} | cars.store | MYAPP\Http\Controllers\CarsController@store |
| GET | cars/{car} | cars.show | MYAPP\Http\Controllers\CarsController@show |
| PUT | cars/{car} | cars.update | MYAPP\Http\Controllers\CarsController@update |
| DELETE | cars/{car} | cars.destroy | MYAPP\Http\Controllers\CarsController@destroy |
| POST | cars/{car}/restore | cars.restore | MYAPP\Http\Controllers\CarsController@restore |
| GET | cars/deleted | cars.deleted | MYAPP\Http\Controllers\CarsController@deleted |

You can also exclude unnecessary routes:
```php
app('router')
    ->apiResource('marks', 'CarsController')
    ->except('restore', 'delete');
```


## Copyright and License

This package was written by Andrey Helldar, and is licensed under [The MIT License](LICENSE).


## Translation

Translations of text and comment by Google Translate.

Help with translation +1 in karma :)
