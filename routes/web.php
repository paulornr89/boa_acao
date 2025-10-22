<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DoadorController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'menu', ['titulo' => 'Menu Principal']);

// Route::get('/teste', function () {
//     return response()->json(['mensagem' => 'Teste OK'], 202);
// });

Route::get('/ola', [HomeController::class, 'index']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::get('/produto', [ProdutoController::class, 'create']);
Route::post('/produto', [ProdutoController::class, 'store']);
Route::get('/produto/{id}/edit',[ProdutoController::class, 'edit'])->name('edit');
Route::post('/produto/{id}/update', [ProdutoController::class, 'update'])->name('update');
Route::get('/produto/{id}/delete', [ProdutoController::class, 'delete'])->name('delete');

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuario', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::post('/usuarios/{id}/update', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/{id}/delete', [UsuarioController::class, 'delete'])->name('usuarios.delete');

Route::get('/item', [ItemController::class, 'create'])->name('itens.create');
Route::post('/item', [ItemController::class, 'store'])->name('itens.store');
Route::get('/itens', [ItemController::class, 'index'])->name('itens.showAll');
Route::get('/itens/{id}', [ItemController::class, 'show'])->name('itens.show');
Route::get('/itens/{id}/edit', [ItemController::class, 'edit'])->name('itens.edit');
Route::post('/itens/{id}/update', [ItemController::class, 'update'])->name('itens.update');
Route::get('/itens/{id}/delete', [ItemController::class, 'delete'])->name('itens.delete');

Route::get('/doacoes', [DoacaoController::class, 'index']);

Route::get('/doacoes/{id}', [DoacaoController::class, 'show']);

Route::get('/doadores', [DoadorController::class, 'index']);

Route::get('/doadores/{id}', [DoadorController::class, 'show']);


