<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\PersonController;
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

// Access routes
Route::get('/login', [AccessController::class, 'loginView'])->name('login');
Route::post('/login', [AccessController::class, 'login'])->name('login');

Route::get('/register', [AccessController::class, 'registerView'])->name('register');
Route::post('/register', [AccessController::class, 'register'])->name('register');


// dahsboard
Route::get('/dashboard', [AccessController::class, 'dashboard'])->name('dashboard');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard'
], function() {
    // logout
    Route::post('/logout', [AccessController::class, 'logout'])->name('logout');

    // person CRUD
    Route::post('/', [PersonController::class, 'create'])->name('create-person');

    Route::delete('/delete/{id}', [PersonController::class, 'delete'])->name('delete-person');

    Route::get('/change-person/{id}', [PersonController::class, 'changeView'])->name('edit-person');
    Route::put('/change-person/{id}', [PersonController::class, 'change'])->name('update-person');
});