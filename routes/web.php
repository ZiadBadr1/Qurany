<?php

use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(\App\Http\Controllers\Backend\SouraCardController::class)->prefix('backend')->name('card.')->middleware('auth')->group(function () {
    Route::get('/card', 'index')->name('index');
    Route::get('/card/create',  'create')->name('create');
    Route::post('/card/store', 'store')->name('store');
    Route::get('/card/edit/{id}', 'edit')->name('edit');
    Route::put('/card/update/{id}', 'update')->name('update');
    Route::delete('/card/delete/{id}','destroy')->name('destroy');

});

Route::controller(\App\Http\Controllers\Backend\SouraController::class)->prefix('backend')->name('soura.')->middleware('auth')->group(function () {
    Route::get('/soura', 'index')->name('index');
    Route::get('/soura/create',  'create')->name('create');
    Route::post('/soura/store', 'store')->name('store');
    Route::get('/soura/edit/{id}', 'edit')->name('edit');
    Route::put('/soura/update/{id}', 'update')->name('update');
    Route::delete('/soura/delete/{id}','destroy')->name('destroy');
});

Route::controller(\App\Http\Controllers\Frontend\SouraCardController::class)->prefix('frontend')->name('front.card.')->group(function () {
    Route::get('/card', 'index')->name('index');
    Route::get('/card/show/{title}','show')->name('show');
});

Route::controller(\App\Http\Controllers\Frontend\SouraController::class)->prefix('frontend')->name('front.soura.')->group(function () {
    Route::get('/soura', 'index')->name('index');
    Route::get('/show/{id}','show')->name('show');
    Route::post('/soura/download/{id}','download')->name('download');
    Route::get('/category/{id}','category')->name('category');
});



Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\SouraCardController::class, 'index']);

