<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Auth;

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
// public routes

Route::get('/', [CatalogController::class, 'index']);
Route::get('/book/{id}', [CatalogController::class, 'show'])->name('show');
Auth::routes();

// auth routes

Route::group(['middleware' => 'auth'], function () {
	//		CRUD operations for admin

	Route::view('/edit/{id}', 'edit-book')->name('edit-book');
	Route::get('/create/{author_name?}', function ($author_name = null) {
		return view('create-book', compact('author_name'));
	})->name('create-book');
	Route::get('/authors', [BookController::class, 'authors'])->name('authors');
	Route::get('/author/{id}', [BookController::class, 'showAuthor'])->name('author');
	Route::post('/create-book', [BookController::class, 'createBook'])->name('createBook');
	Route::get('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete-book');
	Route::get('/edit-book/{id}', [BookController::class, 'editBook'])->name('editBook');

//		CRUD operations for users

	Route::get('/comment/{id}', [CatalogController::class, 'createComment'])->name('create-comment');
	Route::get('/delete-comment/{id}', [CatalogController::class, 'deleteComment'])->name('delete-comment');
});
