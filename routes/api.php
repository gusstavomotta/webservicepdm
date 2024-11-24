
<?php

use Illuminate\Support\Facades\Route;

Route::prefix('arvores')->group(function () {
    Route::get('/', [App\Http\Controllers\ArvoreController::class, 'index']);
    Route::get('/{id}', [App\Http\Controllers\ArvoreController::class, 'show']);
    Route::post('/', [App\Http\Controllers\ArvoreController::class, 'store']);
    Route::put('/{id}', [App\Http\Controllers\ArvoreController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\ArvoreController::class, 'destroy']);
});
