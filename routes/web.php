<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function(){

	Route::get('login', [LoginController::class, 'loginForm'])->name('login.form');
	Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

	Route::get('/', [UserController::class, 'profile'])->name('userProfile');
	
	
	Route::get('authors', [AuthorsController::class, 'authors'])->name('authors');
	Route::get('authors/create', [AuthorsController::class, 'create'])->name('author.create');
	Route::post('authors', [AuthorsController::class, 'store'])->name('author.store');

	Route::get('authors/{id}', [AuthorsController::class, 'author'])->name('author');
	Route::get('authors/{id}/delete', [AuthorsController::class, 'authorDelete'])->name('author.delete');
	
	Route::get('books/{id}/delete', [BooksController::class, 'bookDelete'])->name('book.delete');
	Route::get('authors/{authorId}/add-book', [booksController::class, 'create'])->name('book.create');
	Route::post('authors/{authorId}/add-book', [booksController::class, 'store'])->name('book.store');


});

