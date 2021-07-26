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

// --- --- --- --- ---
// Route::get('/', function () {
//     return view('welcome');
// });
// Commentata!

// Rinomino!

// Route::get('/', function () {
//     return view('guest.home');
// })->name('home');
// Commentata!

// Rinomino X2 (dopo creazione HomeController)

// Rotte pubbliche
// Route::get('/', 'HomeController@index')->name('home');
// Sposto in basso
// --- --- --- --- ---

// Rotte Autenticazione
Auth::routes();
// Auth::routes(['register' => false]); --- disabilita registrazione --- default true
// Auth::routes(['verify' => true]); --- attivare verifica mail (durante registrazione) --- default false

// Route::get('/home', 'HomeController@index')->name('home');
// Commentata!

// Rotte Admin (rotte protette da Autenticazione)
Route::middleware('auth') // autenticazione
    ->namespace('Admin') // controller
    ->name('admin.') // nome rotte
    ->prefix('admin') // url rotte
    ->group(function() {

        Route::get('/', 'HomeController@index')->name('home');
        
        // CRUD 7 rotte 
        Route::resource('posts' , 'PostController');
});

// Rotte pubbliche

// pre Rotta di Fallback
// Route::get('/', 'HomeController@index')->name('home');

// Rotta di Fallback

// --- v.1 - Rotta di Fallback
// Route::get('{any?}', function () {
//     return view ('guest.home');
// })->where('any', '.*')->name('home');

// --- v.2 (con il controller)
Route::get('{any?}', 'HomeController@index')->where('any', '.*')->name('home');
