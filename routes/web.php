<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/book/{book}', [App\Http\Controllers\BookController::class, 'show'])->middleware('auth')->name('book.show');
Route::get('/book-add', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
Route::post('/book-store', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');

Route::get('/group-add', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');
Route::post('/group-store', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');

Route::group(['middleware' => 'leader'], function() {
    Route::get('/home/{user}/setting', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::get('/home/{user}/setting/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});

Route::post('/tag-store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::get('/tag-add', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');

Route::get('/publisher-add', [App\Http\Controllers\PublisherController::class, 'create'])->name('publisher.create');
Route::post('/publisher-store', [App\Http\Controllers\PublisherController::class, 'store'])->name('publisher.store');

Route::get('/author-add', [App\Http\Controllers\AuthorController::class, 'create'])->name('author.create');
Route::post('/author-store', [App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');

Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');

Route::get('/chapter-add/{book}', [App\Http\Controllers\ChapterController::class, 'create'])->name('chapter.create');
Route::get('/chapter/{chapter}', [App\Http\Controllers\ChapterController::class, 'show'])->name('chapter.show');
Route::post('/chapter-store{book}', [App\Http\Controllers\ChapterController::class, 'store'])->name('chapter.store');
Route::get('/chapter/{id}/edit', [App\Http\Controllers\ChapterController::class, 'edit'])->name('chapter.edit');
Route::get('/chapter/{id}/delete', [App\Http\Controllers\ChapterController::class, 'destroy'])->name('chapter.destroy');
Route::put('/chapter/{id}/update', [App\Http\Controllers\ChapterController::class, 'update'])->name('chapter.update');

Route::get('/review', [App\Http\Controllers\ChapterController::class, 'index'])->name('review');
Route::post('/review-store/{book}', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');
Route::get('/review/{id}/edit', [App\Http\Controllers\ReviewController::class, 'edit'])->name('review.edit');
Route::get('/review/{id}/delete', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.destroy');
Route::put('/review/{id}/update', [App\Http\Controllers\ReviewController::class, 'update'])->name('review.update');

Route::get('/volume-add/{book}', [App\Http\Controllers\VolumeController::class, 'create'])->name('volume.create');
Route::post('/volume-store/{book}', [App\Http\Controllers\VolumeController::class, 'store'])->name('volume.store');
