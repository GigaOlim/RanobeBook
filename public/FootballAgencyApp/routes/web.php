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

Route::get('/', function() {
    return redirect()->route('profile.user');
});

Auth::routes();

Route::name('profile.')->prefix('profile')->group(function(){
    Route::get('user', [App\Http\Controllers\HomeController::class, 'index'])->name('user')->middleware('auth');
    Route::get('settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('auth');


    Route::patch('changePassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changePassword')->middleware('auth');
    Route::patch('changeUserInfo', [App\Http\Controllers\HomeController::class, 'changeUserInfo'])->name('changeUserInfo')->middleware('auth');
    Route::post('image', [App\Http\Controllers\HomeController::class, 'addImage'])->name('addImage')->middleware('auth');
});

Route::name('agent.')->prefix('agent')->group(function(){
    Route::get('show', [App\Http\Controllers\AgentController::class, 'index'])->name('show');
    Route::get('show/search', [App\Http\Controllers\AgentController::class, 'search'])->name('search');
    Route::get('show/info/{id}', [App\Http\Controllers\AgentController::class, 'infoAgent'])->name('info');
});

Route::name('players.')->prefix('players')->group(function(){
    Route::get('show', [App\Http\Controllers\PlayerController::class, 'index'])->name('show');
    Route::get('show/search', [App\Http\Controllers\PlayerController::class, 'search'])->name('search');
    Route::get('show/info/{id}', [App\Http\Controllers\PlayerController::class, 'infoPlayer'])->name('info');

});

Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('checkPanel');
    Route::post('addRole', [App\Http\Controllers\AdminController::class, 'addRole'])->name('addRole')->middleware('checkPanel');
    Route::post('addAgent', [App\Http\Controllers\AdminController::class, 'addAgent'])->name('addAgent')->middleware('checkPanel');
    Route::post('addPlayer', [App\Http\Controllers\AdminController::class, 'addPlayer'])->name('addPlayer')->middleware('checkPanel');
    Route::post('addClub', [App\Http\Controllers\AdminController::class, 'addClub'])->name('addClub')->middleware('checkPanel');

    Route::get('destroyPlayer/{id}', [App\Http\Controllers\AdminController::class, 'destroyPlayer'])->name('destroyPlayer')->middleware('checkPanel');
});

