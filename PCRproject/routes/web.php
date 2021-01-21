<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Authentication\RegistrationController;

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
    return view('index');
});

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'post'])->name('saveuser');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [LoginController::class, 'index'])->name('loginpage');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// databse queries related to tasks 
Route::post('/postTask', [TaskController::class, 'saveTask'])->name('savetask');
Route::post('/updateTask', [TaskController::class, 'updateTask'])->name('updatetask');
Route::post('/deleteTask/{task}', [TaskController::class, 'deleteTask'])->name('deletetask');



