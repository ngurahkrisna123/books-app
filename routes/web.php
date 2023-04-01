<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('',[BooksController::class, 'index']);
Route::get('/books',[BooksController::class, 'booksGallery']);
Route::get('/search',[BooksController::class, 'search']);
Route::get('/showsearch',[BooksController::class, 'showsearch']);
Route::get('/topauthor',[BooksController::class, 'topAuthor']);

Route::get('/rating',[BooksController::class, 'rating']);
Route::post('/insertrating',[BooksController::class, 'insertRating']);

Route::get('/addbook',[BooksController::class, 'addBooks']);
Route::post('/insertbook',[BooksController::class, 'insertBooks']);

Route::get('/editbook/{id}',[BooksController::class, 'editBooks']);
Route::post('/updatebook/{id}',[BooksController::class, 'updateBooks']);

Route::get('/deletebook/{id}',[BooksController::class, 'deleteBooks']);



