<?php

use GeneaLabs\LaravelNovaPages\Http\Controllers\PagesController;

Route::get("pages/{slug}", PagesController::class);
