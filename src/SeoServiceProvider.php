<?php

namespace Werxe\Seo;

use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/migrations') => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }
}
