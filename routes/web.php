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

// admin routes
Route::group(['middleware' => 'auth'], function () {
	Route::group(['can' => 'admin'], function () {
		Route::get('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete-book');
		Route::view('/edit/{id}', 'edit-book')->name('edit-book');
		Route::get('/edit-book/{id}', [BookController::class, 'editBook'])->name('editBook');
		Route::view('/create', 'create-book')->name('create-book');
		Route::post('/create-book', [BookController::class, 'createBook'])->name('createBook');
	});
});
