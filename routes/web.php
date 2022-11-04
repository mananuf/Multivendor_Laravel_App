<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Hash;
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
    // dd(Hash::make('password'));
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->group(function () {

    // protected routes
    Route::group(['middleware' => 'admin'], function () {
        // admin dashboard route
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // update password
        Route::match(['get', 'post'], 'update-admin-password', [AdminController::class, 'updateAdminPassword'])
            ->name('admin.password.update');

        // check password match
        Route::match(['get', 'post'], 'check-admin-password', [AdminController::class, 'checkPasswordMatch'])
            ->name('admin.password.check');

        // update admin details
        Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails'])
            ->name('admin.details.update');
    });

    // admin login route
    Route::match(['GET', 'POST'], 'login', [AdminController::class, 'login'])->name('admin.login');
    // logout
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

require __DIR__ . '/auth.php';
