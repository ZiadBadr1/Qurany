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

Route::group([
    'prefix' => 'admin',

],function ()
{
    Route::resource('card',\App\Http\Controllers\Backend\SouraCardController::class);
});

Route::group([
    'prefix' => 'admin',

],function ()
{
    Route::resource('soura',\App\Http\Controllers\Backend\SouraController::class);
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

