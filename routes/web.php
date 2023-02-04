<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::POST('/dashboard/update/{id}', [HomeController::class, 'update'])->middleware(['auth'])->name('dashboard.update');
Route::POST('/dashboard/updateHours', [HomeController::class, 'updateHours'])->middleware(['auth'])->name('dashboard.updateHours');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Routes for pictures picture
Route::get('/admin/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/picture', [PictureController::class, 'pictures'])->name('pictures.pictures');
Route::get('/picture/create', [PictureController::class, 'create'])->name('pictures.create');
Route::post('/picture/create', [PictureController::class, 'store'])->name('pictures.create');
Route::get('/picture/{id}/destroy', [PictureController::class, 'destroy'])->name('pictures.destroy');

// Routes for articles
Route::get('/admin/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles', [ArticleController::class, 'news'])->name('articles.news');
Route::get('/admin/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{id}', [ArticleController::class, 'details'])->name('article.details');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/article/{id}/edit', [ArticleController::class, 'update'])->name('article.update');
Route::get('/article/{id}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');

// Route for others informations gestion
Route::get('/admin/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/create', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}/edit', [ServiceController::class, 'update'])->name('services.update');
Route::get('/services/delete/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

// Routes for books
Route::get('/admin/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books', [BookController::class, 'books'])->name('books.books');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/{id}/edit', [BookController::class, 'update'])->name('books.update');
Route::get('/books/{id}/destroy', [BookController::class, 'destroy'])->name('books.destroy');
require __DIR__ . '/auth.php';
