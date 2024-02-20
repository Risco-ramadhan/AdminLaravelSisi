<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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
Route::get('register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');




Route::controller(AuthController::class)->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('/', 'index')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'login')->name('postLogin');
});
// Route::get('admin/', [AdminController::class, 'index'])->name('Dashboard');

Route::middleware(['auth', 'accesmenu'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/editkaryawan/{id}', [AdminController::class, 'editDataUser']);
    Route::get('/dataKaryawan', [AdminController::class, 'ViewKaryawan'])->name('dataKaryawan');
    Route::get('/karyawanData', [AdminController::class, 'DataKaryawan']);
    Route::get('/menu', [AdminController::class, 'ViewMenu'])->name('menu');
    Route::get('/DataMenu', [AdminController::class, 'DataMenu']);
    Route::get('/userProfile', [AdminController::class, 'viewProfile']);
    Route::put('/editdatamenu/{id}', [AdminController::class, 'editMenu']);
    Route::post('/tambahmenu', [AdminController::class, 'TambahMenu']);
    Route::get('/deletemenu/{id}', [AdminController::class, 'DeleteMenu']);
    Route::put('/edituser/{id}', [AdminController::class, 'EditUser']);
    Route::post('/tambahuser', [AdminController::class, 'TambahUser']);
    Route::get('/deleteuser/{id}', [AdminController::class, 'DeleteUser']);
});

// Route::middleware(['auth', 'CekUserLogin:2'])->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
// });
