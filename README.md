## Seo

[![Build Status](https://travis-ci.org/werxe/laravel-seo.svg?branch=master)](https://travis-ci.org/werxe/laravel-seo)


## Requirements

To use this package you need:

- PHP >= 5.5.9 or HHVM >= 3.6 (we recommend the latest stable version of PHP or HHVM)
- Laravel >= 5.1

## Installation

Install this package with Composer by running:

```sh
$ composer require werxe/laravel-seo "~1.0"
```

Open your terminal and navigate to your application root folder and then run `

Once that's complete, open your `config/app.php` file and add the Service Provider to the `providers` array:

    Werxe\LaravelSeo\LaravelSeoServiceProvider::class,

Now run `php vendor:publish --provider="Werxe\\LaravelSeo\\LaravelSeoServiceProvider"` to publish the migration file and then run `php artisan migrate`.

The installation of the pacakge is now complete.

## Setup your model

You'll need to insert the `Werxe\LaravelSeo\Traits\SeoableTrait` trait and create the `seo()` method as specified below:

```php
namespace App\Models;

use Werxe\LaravelSeo\Entities\Seo;
use Werxe\LaravelSeo\Traits\SeoableTrait;

class Post extends Eloquent
{
    use SeoableTrait;

    /**
     * {@inheritdoc}
     */
    protected $table = 'posts';

    /**
     * Returns the seo entry that belongs to this entity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function seo()
    {
        return $this->morphOne(Seo::class, 'entity');
    }
}
```

## Testing

Werxe\Address has a [PHPUnit](https://phpunit.de/) test suite. To run the tests, run the following command from the project folder.

```sh
$ phpunit
```

## Contributing

Contributions are welcome and will be fully credited. Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email bruno@werxe.com instead of using the issue tracker.

### License

This software is released under the [BSD 3-Clause](LICENSE) License.

© 2011-2015 Werxe LTD, All rights reserved.
