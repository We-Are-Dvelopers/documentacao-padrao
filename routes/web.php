<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ConteudoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::prefix('/conteudos')->controller(ConteudoController::class)->name('conteudos.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::put('/{id}/update','update')->name('update');
        Route::delete('/{id}/destroy','destroy')->name('destroy');
    });
    Route::prefix('/categorias')->controller(CategoriasController::class)->name('categorias.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::put('/{id}/update','update')->name('update');
        Route::delete('/{id}/destroy','destroy')->name('destroy');
    });
});