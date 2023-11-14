<?php

use System\Support\Route;
use App\Controller\AppController;

Route::get('/', [AppController::class, 'index']);
Route::get('/rizikprogrammer', [AppController::class, 'rizikprogrammer']);