<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\RSAController;
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
Route::post('book/{id}/delete', [BookController::class, 'delete']);
Route::get('genre/{genre}', [BookController::class, 'getByGenre']);

Route::post('add-borrow', [BookBorrowController::class, 'borrow']);
Route::get('history/{id}', [BookBorrowController::class, 'borrowHistory']);
Route::get('borrowed-books', [BookBorrowController::class, 'getBorrowingBooks']);

Route::get('user/{user_id}/return/{book_id}', [BookBorrowController::class, 'returnABook']);

Route::get('get-lastest-id', [UserController::class, 'getLastestID']);

Route::get('genre', [GenreController::class, 'getAll']);
Route::post('create-genre', [GenreController::class, 'create']);
Route::post('genre/{id}/edit', [GenreController::class, 'edit']);
Route::get('genre/{id}/delete', [GenreController::class, 'delete']);

Route::get('rsa/new-challenge', [RSAController::class, 'challengeGen']);
Route::post('rsa/verify-challenge', [RSAController::class, 'RSAVerify']);