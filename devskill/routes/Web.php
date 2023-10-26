<?php

use App\Controllers\AppController;
use DevSkill\Supports\Route;

// $route = new Route();
// $route->get('/', [AppController::class, 'index']);

Route::get('/', [AppController::class, 'index']);
Route::get('/devskill', [AppController::class, 'index']);


