## Extended Routes for Laravel

<img src="https://preview.dragon-code.pro/TheDragonCode/extended-routes.svg?brand=laravel" alt="Extended Routes"/>

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![Github Workflow Status][badge_build]][link_build]
[![License][badge_license]][link_license]

> This helper extends the standard set of resource routing methods to work with SoftDeletes and other extends.


## Installation

### Compatibility

| Laravel     | PHP                     | Extended Routes Version |
|-------------|-------------------------|-------------------------|
| 7, 8, 9, 10 | 7.3, 7.4, 8.0, 8.1, 8.2 | `^3.0`                  |
| 10, 11      | 8.1, 8.2, 8.3           | `^4.0`                  |


To get the latest version of `Extended Routes`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require dragon-code/extended-routes
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "dragon-code/extended-routes": "^4.0"
    }
}
```

### Upgrade from `andrey-helldar/extended-routes`

1. In your `composer.json` file, replace `"andrey-helldar/extended-routes": "^2.0"` with `"dragon-code/extended-routes": "^3.0"`.
2. Replace the `Helldar\ExtendedRoutes` namespace prefix with `DragonCode\ExtendedRoutes` in your app;
3. Run the `command composer` update.
4. Profit!

## Using

### With trait

```php
use DragonCode\ExtendedRoutes\Routing\ModelBindingResolver;
use DragonCode\ExtendedRoutes\Traits\ExtendedSoftDeletes;

class Page extends Model
{
    use ExtendedSoftDeletes;
}
```

### Extends of the abstract model

```php
use DragonCode\ExtendedRoutes\Models\ExtendedSoftDeletes;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Foo extends ExtendedSoftDeletes
{
    //use SoftDeletes; << need to remove conflicting trait.
}
```

### Routes

```php
app('router')->apiRestorableResource('foos', 'FoosController');

// or

Route::apiRestorableResource('foos', 'FoosController');
```

Referencing is also available:

```php
use App\Http\Controllers\FoosController;

app('router')->apiRestorableResource('foos', FoosController::class);

// or

Route::apiRestorableResource('foos', FoosController::class);
```

| Method    | URI                    | Name         | Action                                      | Middleware |
|-----------|------------------------|--------------|---------------------------------------------|------------|
| GET/HEAD  | api/foos               | foos.index   | App\Http\Controllers\FoosController@index   | api        |
| POST      | api/foos               | foos.store   | App\Http\Controllers\FoosController@store   | api        |
| GET/HEAD  | api/foos/trashed       | foos.trashed | App\Http\Controllers\FoosController@trashed | api        |
| GET/HEAD  | api/foos/{foo}         | foos.show    | App\Http\Controllers\FoosController@show    | api        |
| PUT/PATCH | api/foos/{foo}         | foos.update  | App\Http\Controllers\FoosController@update  | api        |
| DELETE    | api/foos/{foo}         | foos.destroy | App\Http\Controllers\FoosController@destroy | api        |
| POST      | api/foos/{foo}/restore | foos.restore | App\Http\Controllers\FoosController@restore | api        |

## License

This package is licensed under the [MIT License](LICENSE).

This package was written with the participation of [Maksim (Ellrion) Platonov](https://github.com/Ellrion) under [MIT License](LICENSE).


[badge_build]:          https://img.shields.io/github/actions/workflow/status/TheDragonCode/extended-routes/phpunit.yml?style=flat-square

[badge_downloads]:      https://img.shields.io/packagist/dt/dragon-code/extended-routes.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/dragon-code/extended-routes.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/TheDragonCode/extended-routes?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_build]:           https://github.com/TheDragonCode/extended-routes/actions

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/dragon-code/extended-routes
