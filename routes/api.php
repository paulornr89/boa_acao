<?php

use App\Http\Controllers\Api\Auth\LoginStatefullController;
use App\Http\Controllers\Api\Auth\LoginTokensController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\DoadorController;
use App\Http\Controllers\Api\OrganizacaoController;

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
 
    Route::apiResource('itens', ItemController::class)
        ->parameters(['itens' => 'item'])
        ->only(['index','show']);
    Route::apiResource('categorias', CategoriaController::class)
        ->only(['index','show']);
    Route::apiResource('users', UserController::class)
        ->only(['store']);//o store ficou fora pois um usuário pode criar se cadastrar sem ter se autenticado
    Route::apiResource('organizacoes', OrganizacaoController::class)
        ->only(['index']);//está liberado para consulta pois as pessoas podem consultar instituições beneficentes
    
    Route::middleware('auth:sanctum')->group(function () {     
        Route::apiResource('itens', ItemController::class)
            ->parameters(['itens' => 'item'])
            ->only(['store', 'update', 'destroy'])
            ->middleware('ability:is-admin,is-donor');
        Route::apiResource('categorias', CategoriaController::class)
            ->only(['store', 'update', 'destroy'])
            ->middleware('ability:is-admin'); 
        Route::apiResource('users', UserController::class)
            ->only(['index'])
            ->middleware('ability:is-admin'); 
        Route::apiResource('doadores', DoadorController::class)
            ->only(['index'])
            ->middleware('ability:is-admin'); 

        Route::apiResource('users', UserController::class)
        ->except(['index','store']) // Exclui a listagem (index)
        ->middleware('ability:is-admin,is-donor');

        Route::apiResource('organizacoes', OrganizacaoController::class)
        ->except(['index'])
        ->middleware('ability:is-admin,is-organization');

        Route::apiResource('doadores', DoadorController::class)
        ->except(['index']) // Exclui a listagem (index)
        ->middleware('ability:is-admin,is-donor');
        });        
});