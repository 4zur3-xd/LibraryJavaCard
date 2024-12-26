<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookBorrowController;

Route::prefix('user')->group(function(){
    Route::post('create', [UserController::class, 'create']);

    Route::get('get-all', [UserController::class, 'getAll']);

    Route::get('{id}', [UserController::class, 'getByID']);
});

Route::prefix('book')->group(function(){
    Route::post('create', [BookController::class, 'create']);

    Route::get('get-all', [BookController::class, 'getAll']);

    Route::get('{id}', [BookController::class, 'getByID']);
});

Route::post('add-borrow', [BookBorrowController::class, 'borrow']);
Route::get('history/{id}', [BookBorrowController::class, 'borrowHistory']);