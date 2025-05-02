<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferenciaController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/cadastro', [CadastroController::class, 'index']);
Route::post('/cadastro', [CadastroController::class, 'register'])->name('register.submit');;

Route::get('/conta', [ContaController::class, 'index'])->middleware('auth')->name('conta');
Route::post('/conta/cadastrar', [ContaController::class, 'criar'])->middleware('auth')->name('conta.criar');

Route::post('/conta/depositar', [TransferenciaController::class, 'depositar'])->middleware('auth')->name('transferencia.depositar');
Route::post('/conta/transferir', [TransferenciaController::class, 'transferir'])->middleware('auth')->name('transferencia.transferir');
Route::get('/conta/transferencias', [TransferenciaController::class, 'exibirTransferencias'])->middleware('auth')->name('transferencia.transfererir');
Route::get('/conta/desfazer/{conta_id}', [TransferenciaController::class, 'index'])->middleware('auth')->name('transferencia.index');
Route::post('/conta/desfazer/{conta_id}', [TransferenciaController::class, 'desfazerTransferencia'])->middleware('auth')->name('transferencia.desfazer');