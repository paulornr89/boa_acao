<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\CategoriaController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'menu', ['titulo' => 'Menu Principal']);

// Route::get('/teste', function () {
//     return response()->json(['mensagem' => 'Teste OK'], 202);
// });

Route::get('/ola', [HomeController::class, 'index']);

Route::controller(ProdutoController::class)->group(function () {
    Route::prefix('/produtos')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
    });
    
    Route::prefix('/produto')->group(function () {
        Route::get('/', 'create');
        Route::post('/', 'store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/delete', 'delete')->name('delete');
    });
});

Route::controller(UsuarioController::class)->group(function () {
    Route::prefix('/usuarios')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show')->name('usuario.show');
    });
    
    Route::prefix('/usuario')->group(function () {
        Route::get('/', 'create')->name('usuarios.create');
        Route::post('/', 'store')->name('usuarios.store');
        Route::get('/{id}/edit', 'edit')->name('usuarios.edit');
        Route::post('/{id}/update', 'update')->name('usuarios.update');
        Route::get('/{id}/delete', 'delete')->name('usuarios.delete');
    });
});


Route::controller(ItemController::class)->group(function() {
    Route::prefix('/itens')->group(function () {
        Route::get('/', 'index')->name('itens.index');
        Route::get('/{id}', 'show')->name('itens.show');
    });
    
    Route::prefix('/item')->group(function () {
        Route::get('/', 'create')->name('itens.create');
        Route::post('/', 'store')->name('itens.store');
        Route::get('/{id}/edit', 'edit')->name('itens.edit');
        Route::post('/{id}/update', 'update')->name('itens.update');
        Route::get('/{id}/delete', 'delete')->name('itens.delete');
    });
});

Route::controller(CategoriaController::class)->group(function () {
    Route::prefix('/categorias')->group(function () {
        Route::get('/', 'index')->name('categorias.index');
        Route::get('/{id}', 'show')->name('categorias.show');
    });
    
    Route::prefix('/categoria')->group(function () {
        Route::get('/', 'create')->name('categorias.create');
        Route::post('/', 'store')->name('categorias.store');
        Route::get('/{id}/edit', 'edit')->name('categorias.edit');
        Route::post('/{id}/update', 'update')->name('categorias.update');
        Route::get('/{id}/delete', 'delete')->name('categorias.delete');
    });
});


Route::get('/doacoes', [DoacaoController::class, 'index']);

Route::get('/doacoes/{id}', [DoacaoController::class, 'show']);

Route::get('/doadores', [DoadorController::class, 'index']);

Route::get('/doadores/{id}', [DoadorController::class, 'show']);


