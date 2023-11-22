<?php

use System\Support\Route;
use App\Controller\AppController;

Route::get('/', [AppController::class, 'index'], 'test');
// Route::get('/', [AppController::class, 'index']);
// Route::get('/', [AppController::class, 'index'], 'test');
// Route::get('/rizikprogrammer', [AppController::class, 'rizikprogrammer']);