<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});



Route::get('/login', function () {
    return view('login');
})->name(name: 'login');

Route::post('/welcome', [LoginController::class, 'Login' ])->name('UserLogin');


Route::get('/test',[UserController::class, 'index']
)->name('user.index')->middleware('auth');

Route::post('/register',[UserController::class, 'create'])->name('create.post');

Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('user.edit');


Route::get('/user/{id}/delete',[UserController::class, 'delete'])->name('user.delete');

Route::get('/user/{id}/view',[UserController::class, 'view'])->name('user.view');



