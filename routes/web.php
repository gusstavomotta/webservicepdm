<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArvoreWebController;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::prefix('arvores')->group(function () {
    Route::get('/', [ArvoreWebController::class, 'index'])->name('arvores.index'); 
    Route::get('/create', [ArvoreWebController::class, 'create'])->name('arvores.create'); 
    Route::post('/', [ArvoreWebController::class, 'store'])->name('arvores.store'); 
    Route::get('/{id}', [ArvoreWebController::class, 'show'])->name('arvores.show'); 
    Route::get('/{id}/edit', [ArvoreWebController::class, 'edit'])->name('arvores.edit'); 
    Route::put('/{id}', [ArvoreWebController::class, 'update'])->name('arvores.update'); 
    Route::delete('/{id}', [ArvoreWebController::class, 'destroy'])->name('arvores.destroy'); 
});
