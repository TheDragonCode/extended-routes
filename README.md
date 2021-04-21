## Extended Routes

This helper extends the standard set of resource routing methods to work with SoftDeletes and other extends.

![extended routes](https://user-images.githubusercontent.com/10347617/42057776-0d4ad46a-7b27-11e8-88c9-36248498818c.png)

<p align="center">
    <a href="https://styleci.io/repos/138897572"><img src="https://styleci.io/repos/138897572/shield" alt="StyleCI" /></a>
    <a href="https://github.com/andrey-helldar/extended-routes/actions"><img src="https://img.shields.io/github/workflow/status/andrey-helldar/extended-routes/phpunit?style=flat-square" alt="Github Workflow Status" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://img.shields.io/packagist/dt/andrey-helldar/extended-routes.svg?style=flat-square" alt="Total Downloads" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://img.shields.io/github/v/release/andrey-helldar/extended-routes?label=stable&style=flat-square" alt="Latest Stable Version" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/extended-routes"><img src="https://img.shields.io/badge/unstable-dev--master-orange?style=flat-square" alt="Latest Unstable Version" /></a>
    <a href="LICENSE"><img src="https://img.shields.io/packagist/l/andrey-helldar/extended-routes.svg?style=flat-square" alt="License" /></a>
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
        "andrey-helldar/extended-routes": "^2.0"
    }
}
```

For Laravel 5.4 - 6.x use `^1.0` version.


## Using

Add to BaseModel method

```php
use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    public function resolveRouteBinding($value, $field = null)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value, $field);
    }
}
```

or change extends of model:

```php
use Helldar\ExtendedRoutes\Models\ExtendedSoftDeletes;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Foo extends ExtendedSoftDeletes
{
    //use SoftDeletes; << need to remove conflicting trait.
}
```

or using trait:

```php
use Helldar\ExtendedRoutes\Traits\ExtendedSoftDeletes;
//use Illuminate\Database\Eloquent\SoftDeletes; << need to remove conflicting trait.

class Foo extends Model
{
    use ExtendedSoftDeletes;
}
```

and for some model Foo with SoftDeletes trait we can add routes:

```php
app('router')->apiRestorableResource('foos', 'FoosController');

// or

Route::apiRestorableResource('foos', 'FoosController');
```

| Method | URI | Name | Action | Middleware |
|---|---|---|---|---|
| GET/HEAD  | api/foos               | foos.index   | App\Http\Controllers\FoosController@index     | api |
| POST      | api/foos               | foos.store   | App\Http\Controllers\FoosController@store     | api |
| GET/HEAD  | api/foos/trashed       | foos.trashed | App\Http\Controllers\FoosController@trashed   | api |
| GET/HEAD  | api/foos/{foo}         | foos.show    | App\Http\Controllers\FoosController@show      | api |
| PUT/PATCH | api/foos/{foo}         | foos.update  | App\Http\Controllers\FoosController@update    | api |
| DELETE    | api/foos/{foo}         | foos.destroy | App\Http\Controllers\FoosController@destroy   | api |
| POST      | api/foos/{foo}/restore | foos.restore | App\Http\Controllers\FoosController@restore   | api |


## License

This package is licensed under the [MIT License](LICENSE).

This package was written with the participation of [Maksim (Ellrion) Platonov](https://github.com/Ellrion/) under [MIT License](LICENSE).


## For Enterprise

Available as part of the Tidelift Subscription.

The maintainers of `andrey-helldar/extended-routes` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source packages you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact packages you use. [Learn more](https://tidelift.com/subscription/pkg/packagist-andrey-helldar-extended-routes?utm_source=packagist-andrey-helldar-extended-routes&utm_medium=referral&utm_campaign=enterprise&utm_term=repo).

