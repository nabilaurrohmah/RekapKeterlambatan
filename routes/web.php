<?php

use Illuminate\Routing\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LatesController;

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

Route::get('/error-permission', function () {
    return view('404');
});

//    Route::get('/', function () {
//     return view('login');
//    })->name('login');

//    Route::post('/login', [UsersController::class, 'loginAuth'])->name('login.auth');
//    Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

//    Route::middleware('isLogin')->group(function() {
    Route::get('/', function () {
        return view('home');
    });
//    });

    // Route::middleware('IsLogin', 'IsAdmin')->group(function () {
        // penggunaan prefix digunakan untuk mempermudah menu yang memiliki banyak fitur
        // untuk mengelompokkan route-route
        Route::prefix('/students')->name('students.')->group(function () {
        Route::get('/', [StudentsController::class, 'index'])->name('index');
        Route::get('/create', [StudentsController::class, 'create'])->name('create');
        Route::post('/store', [StudentsController::class, 'store'])->name('store');
        Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
        Route::get('/{id}', [StudentsController::class, 'show'])->name('show');
        });
    
    Route::prefix('/rombels')->name('rombels.')->group(function(){
        Route::get('/', [RombelsController::class, 'index'])->name('home');
        Route::get('/create', [RombelsController::class, 'create'])->name('create');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/rayons')->name('rayons.')->group(function(){
        Route::get('/', [RayonsController::class, 'index'])->name('home');
        Route::get('/create', [RayonsController::class, 'create'])->name('create');
        Route::post('/store', [RayonsController::class, 'store'])->name('store');
        Route::get('{id}', [RayonsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/lates')->name('lates.')->group(function(){
        Route::get('/', [LatesController::class, 'index'])->name('home');
        Route::get('/create', [LatesController::class, 'create'])->name('create');
        Route::post('/store', [LatesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LatesController::class, 'index'])->name('edit');
        Route::patch('/update/{id}', [LatesController::class, 'edit'])->name('update');
        Route::delete('/delete/{id}', [LatesController::class, 'update'])->name('delete');
        Route::get('/{id}', [LatesController::class, 'show'])->name('show');
    });

    Route::prefix('/users')->name('users.')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('home');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('/data', [UsersController::class, 'index'])->name('data');
        Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('delete');
    });

// });

