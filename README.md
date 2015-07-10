## Laravel SEO

[![Build Status](https://travis-ci.org/werxe/laravel-seo.svg?branch=master)](https://travis-ci.org/werxe/laravel-seo)

Laravel SEO is package that allows you to manage your Eloquent entities SEO records easily and effortless.

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

## Usage

Now that you have the package installed and your model(s) set up, it's time to learn how to use this beauty.

#### Check if an entity has a SEO record

```php
$post = Post::find(1);

if (! $post->hasSeo()) {
    echo "Post doesn't have a SEO record!";
}
```

#### Create a SEO record on the entity

Since our post doesn't have a SEO record, we'll create one, with some basic data.

```php
$post = Post::find(1);

$post->createSeo([
    'title'    => 'SEO title of my awesome post',
    'keywords' => 'foo, bar, baz',
]);
```

#### Update the SEO record on the entity

In this example we'll update the SEO record of a post and we're going to add some extra meta properties.

```php
$post = Post::find(1);

$post->updateSeo([
    'meta' => [
        'published_time' => time(),
        'section'        => 'news',
    ],
]);
```

#### Create or Update the SEO record

In some situations we might not want to have to write code to check if an entity already has a SEO record or not, in those situations you can just use the `storeSeo()` method:

```php
$post = Post::find(1);

$post->storeSeo([
    'title' => 'SEO title of my awesome post',
]);
```

#### Delete the SEO record from an entity

If you need to delete the SEO record of an entity, you just need to call the `deleteSeo()` method:

```php
$post = Post::find(1);

$post->deleteSeo();
```

#### Retrieve the SEO record

When you need to retrieve the SEO record from the entity you just need to call the `seo` property:

```php
$post = Post::find(1);

$seo = $post->seo;

echo $seo->title;

echo $seo->meta->get('section');
```

## Testing

Werxe\LaravelSeo has a [PHPUnit](https://phpunit.de/) test suite. To run the tests, run the following command from the project folder.

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
