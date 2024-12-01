<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('alunos', \App\Http\Controllers\AlunoController::class);
    Route::resource('carteirinhas', \App\Http\Controllers\CarteirinhaController::class);
    Route::resource('pagamentos', \App\Http\Controllers\PagamentoController::class);
});

require __DIR__ . '/auth.php';
