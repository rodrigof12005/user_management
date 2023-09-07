<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('login');});
Route::get('cadastro', function () { return view('cadastro');})->name('cadastro');
Route::get('form_login', [LoginController::class, 'index'])->name('form_login');
Route::get('recuperar_acesso', [LoginController::class, 'recuperar_acesso'])->name('recuperar_acesso');
Route::post('cadastrar', [UserController::class, 'cadastrar'])->name('cadastrar');
Route::post('autenticar', [LoginController::class, 'autenticar'])->name('autenticar');
Route::post('enviar_senha', [LoginController::class, 'enviar_senha'])->name('enviar_senha');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('editar_perfil/{id}', [UserController::class, 'editar_perfil'])->name('editar_perfil');
    Route::patch('update_perfil/{id}', [UserController::class, 'update_perfil'])->name('update_perfil');
    Route::get('adminUsers', [UserController::class, 'adminUsers'])->name('adminUsers');
    Route::get('delete_usuario/{id}', [UserController::class, 'delete'])->name('delete_usuario');

});
