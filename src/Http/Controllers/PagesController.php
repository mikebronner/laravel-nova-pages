<?php

namespace GeneaLabs\LaravelNovaPages\Http\Controllers;

use GeneaLabs\LaravelNovaPages\Page;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $pageClass = Page::model();
        $page = (new $pageClass)
            ->where("slug", $slug)
            ->first();

        return view("laravel-nova-pages::pages.show")
            ->with(compact("page"));
    }
}
