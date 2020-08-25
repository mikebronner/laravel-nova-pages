<?php

namespace GeneaLabs\LaravelNovaPages\Providers;

use GeneaLabs\LaravelNovaPages\Nova\Page;
use GeneaLabs\LaravelNovaPages\Page as PageModel;
use Laravel\Nova\Nova as LaravelNova;
use Laravel\Nova\NovaApplicationServiceProvider;

class Nova extends NovaApplicationServiceProvider
{
    protected function resources()
    {
        Page::$model = PageModel::model();

        (new LaravelNova())->resources([
            Page::class,
        ]);
    }
}
