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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});

Route::get('/etudiants', 'App\Http\Controllers\FrontController@ListeEtudiants');
Route::get('/clubs', 'App\Http\Controllers\FrontController@ListeClubs');
Route::get('/evenments', 'App\Http\Controllers\FrontController@ListeEvenements');
Route::get('/formations', 'App\Http\Controllers\FrontController@ListeFormations');
Route::get('/', 'App\Http\Controllers\FrontController@Liste3Evenements');



