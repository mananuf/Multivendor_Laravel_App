<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->group(function () {

    // protected routes
    Route::group(['middleware' => 'admin'], function () {
        // admin dashboard route
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
    });

    // admin login route
    Route::get('/login', [AdminController::class, 'login']);
});

require __DIR__ . '/auth.php';
