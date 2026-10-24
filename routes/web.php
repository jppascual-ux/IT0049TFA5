<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SariPOS Web Routes (TFA5)
|--------------------------------------------------------------------------
| Each route maps a URL to a controller method, the same job CodeIgniter's
| app/Config/Routes.php did in TFA1. Named routes let the Blade views build
| links with route('name') instead of hard-coding URLs.
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
