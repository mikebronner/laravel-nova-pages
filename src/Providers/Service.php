<?php

namespace GeneaLabs\LaravelNovaPages\Providers;

use GeneaLabs\LaravelNovaPages\Page;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . "/../../resources/views", "laravel-nova-pages");
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        // $this->loadViewComponentsAs('laravel-nova-blog', [
        //     // Post::class,
        //     // Posts::class,
        // ]);

        if (Page::runsMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path("migrations")
        ], 'migrations');
    }

    public function register()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'laravel-nova-pages'
        );
    }
}
