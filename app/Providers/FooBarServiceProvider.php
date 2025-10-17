<?php
use App\Data\Bar;
use App\Data\Foo;
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    $this->app->singleton(Foo::class, function ($app) {
        return new Foo();
    });
    $this->app->singleton(Bar::class, function ($app) {
        return new Bar($app->make(Foo::class));
    });
}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
