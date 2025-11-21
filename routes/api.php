<?php

use App\Http\Controllers\Api\Auth\LoginStatefullController;
use App\Http\Controllers\Api\Auth\LoginTokensController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\SubcategoriaController;


Route::prefix('v1')->group(function () {
    Route::middleware('web')
    ->prefix('spa')
    ->controller(LoginStatefullController::class)
    ->group(function () {
        Route::post("/login", [LoginStatefullController::class, 'login']);
        Route::post("/logout", [LoginStatefullController::class, 'logout']);
    });
    
    Route::prefix('tokens')
    ->controller(LoginTokensController::class)
    ->group(function () {
        Route::post('logout','logout')->middleware("auth:sanctum");
        Route::post('revoke','revoke')->middleware("auth:sanctum");
        Route::post('login','login');
    });
    
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });//->middleware('auth:sanctum');
    
    Route::resource('produtos', ProdutoController::class)->only(['index', 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('produtos', ProdutoController::class)->only(['store', 'update', 'destroy']);
    });
    
    Route::apiResource('usuarios', UsuarioController::class);

    Route::apiResource('users', UserController::class);
    // Route::apiResource('users', UserController::class)
    //     ->except(['index','show']);
});



Route::apiResource('itens', ItemController::class)->parameters(['itens' => 'item']);

Route::apiResource('categorias', CategoriaController::class);

Route::apiResource('subcategorias', SubcategoriaController::class);

