<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login.index');
});
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/list', [EmployeeController::class, 'index']);
Route::get('/list/tambah-karyawan',[EmployeeController::class, 'createview']);
Route::post('/list/tambah-karyawan',[EmployeeController::class, 'create']);
Route::get('/list/edit/{id}', [EmployeeController::class, 'editview']);
Route::put('/list/edit/{id}', [EmployeeController::class, 'update']);
Route::delete('/list/{id}', [EmployeeController::class, 'delete']);

