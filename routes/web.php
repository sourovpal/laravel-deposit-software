<?php

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

Route::prefix('/dashboard')->as('dashboard.')->group(function(){

    Route::controller('Admin\AdminAuthController')->group(function(){
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginSubmit')->name('login.submit');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::middleware(['admin.auth'])->group(function(){

        Route::controller('Admin\DashboardController')->group(function(){
            Route::get('/', 'index')->name('index');
        });
    
        Route::controller('Admin\AdminController')->as('admin.')->prefix('admins')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/edit/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        
        Route::controller('Admin\UserController')->as('user.')->prefix('users')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/edit/{id}', 'update')->name('update');
            Route::get('/destroy', 'destroy')->name('destroy');
        });
    
        Route::controller('Admin\ProductController')->as('product.')->prefix('products')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/edit/{id}', 'update')->name('update');
            Route::get('/destroy', 'destroy')->name('destroy');
        });

    });

});