<?php

use App\Controllers\AppController;
use DevSkill\Supports\Route;

Route::get('/', [AppController::class, 'index']);

$route = new Route();
$route->get('/', [AppController::class, 'index']);