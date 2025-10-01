<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DoadorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', [HomeController::class, 'index']);

Route::get('/produtos', [ProdutoController::class, 'index']);

Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

Route::get('/usuarios', [UsuarioController::class, 'index']);

Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);

Route::get('/doacoes', [DoacaoController::class, 'index']);

Route::get('/doacoes/{id}', [DoacaoController::class, 'show']);

Route::get('/itens', [ItemController::class, 'index']);

Route::get('/itens/{id}', [ItemController::class, 'show']);

Route::get('/doadores', [DoadorController::class, 'index']);

Route::get('/doadores/{id}', [DoadorController::class, 'show']);