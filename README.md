## Extended Routes

This helper extends the standard set of resource routing methods to work with SoftDeletes and other extends.

![extended routes](https://user-images.githubusercontent.com/10347617/42057776-0d4ad46a-7b27-11e8-88c9-36248498818c.png)

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
        "andrey-helldar/extended-routes": "^1.1"
    }
}
```

If you don't use auto-discovery, add the ServiceProvider to the `providers` array in `config/app.php`:
```php
Helldar\ExtendedRoutes\ServiceProvider::class,
```


## Using

Add to BaseModel method

```php
use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;

public function resolveRouteBinding($value)
{
    return (new ModelBindingResolver($this))
        ->resolve($value);
}
```

or change extends of model:

```php
use Helldar\ExtendedRoutes\Models\SoftDeletesModel;

class Foo extends SoftDeletesModel {
    //
}
```

and for some model Foo with SoftDeletes trait we can add routes:

```php
app('router')->apiRestorableResource('foos', 'FoosController');

// or

Route::apiRestorableResource('foos', 'FoosController');
```

| Domain | Method | URI | Name | Action | Middleware |
|---|---|---|---|---|---|
| | GET/HEAD  | api/foos               | foos.index   | App\Http\Controllers\FoosController@index     | api        |
| | POST      | api/foos               | foos.store   | App\Http\Controllers\FoosController@store     | api        |
| | GET/HEAD  | api/foos/trashed       | foos.trashed | App\Http\Controllers\FoosController@trashed   | api        |
| | GET/HEAD  | api/foos/{foo}         | foos.show    | App\Http\Controllers\FoosController@show      | api        |
| | PUT/PATCH | api/foos/{foo}         | foos.update  | App\Http\Controllers\FoosController@update    | api        |
| | DELETE    | api/foos/{foo}         | foos.destroy | App\Http\Controllers\FoosController@destroy   | api        |
| | POST      | api/foos/{foo}/restore | foos.restore | App\Http\Controllers\FoosController@restore   | api        |


## Copyright and License

This package licensed under [The MIT License](LICENSE).
