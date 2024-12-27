<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookBorrowController;

Route::post('create-user', [UserController::class, 'create']);
Route::get('get-all-users', [UserController::class, 'getAll']);
Route::get('user/{id}', [UserController::class, 'getByID']);

Route::post('create-book', [BookController::class, 'create']);
Route::get('get-all-books', [BookController::class, 'getAll']);
Route::get('book/{id}', [BookController::class, 'getByID']);

Route::post('add-borrow', [BookBorrowController::class, 'borrow']);
Route::get('history/{id}', [BookBorrowController::class, 'borrowHistory']);