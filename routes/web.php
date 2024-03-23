<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SimulacroController;
use App\Http\Controllers\PreguntaController;
Route::get('/', function () {
    return view('login/login');
})->name('login');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/recovery_before', [LoginController::class, 'recovery_before'])->name('recovery_before');
Route::post('/store_user', [LoginController::class, 'store_user'])->name('store_user');
Route::post('/verify', [LoginController::class, 'verify'])->name('verify');
Route::get('/recovery/{id}', [LoginController::class, 'recovery'])->name('recovery');
Route::put('/recovery_user/{id}', [LoginController::class, 'recovery_user'])->name('recovery_user');
Route::post('/autenticacion', [LoginController::class, 'autenticacion'])->name('autenticacion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/start', [SimulacroController::class, 'start'])->name('start')->middleware('auth');
Route::get('/simulacro', [SimulacroController::class, 'simulacro'])->name('simulacro')->middleware('auth');
Route::get('/list_simulacro/{value}', [SimulacroController::class, 'list_simulacro'])->name('list_simulacro')->middleware('auth');

Route::get('/list_question', [PreguntaController::class, 'list_question'])->name('list_question')->middleware('auth');
Route::get('/create_question', [PreguntaController::class, 'create_question'])->name('create_question')->middleware('auth');
Route::post('/store_question', [PreguntaController::class, 'store_question'])->name('store_question')->middleware('auth');
