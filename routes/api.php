<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\SubcategoriaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('produtos', ProdutoController::class);

Route::apiResource('usuarios', UsuarioController::class);

Route::apiResource('itens', ItemController::class)->parameters(['itens' => 'item']);

Route::apiResource('categorias', CategoriaController::class);

Route::apiResource('subcategorias', SubcategoriaController::class);

Route::apiResource('users', UserController::class);
