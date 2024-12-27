<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookBorrowController;

Route::post('create-user', [UserController::class, 'create']);
Route::get('get-all-users', [UserController::class, 'getAll']);
Route::get('user/{id}', [UserController::class, 'getByID']);
Route::post('user/{id}/edit', [UserController::class, 'edit']);

Route::post('create-book', [BookController::class, 'create']);
Route::get('get-all-books', [BookController::class, 'getAll']);
Route::get('book/{id}', [BookController::class, 'getByID']);
Route::post('book/{id}/edit', [BookController::class, 'edit']);

Route::post('add-borrow', [BookBorrowController::class, 'borrow']);
Route::get('history/{id}', [BookBorrowController::class, 'borrowHistory']);

Route::get('user/{user_id}/return/{book_id}', [BookBorrowController::class, 'returnABook']);

Route::get('get-lastest-id', [UserController::class, 'getLastestID']);