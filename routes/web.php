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
Route::get('/login', function () {
    return view('login');});

//Route::get('/inscrire', 'App\Http\Controllers\Insert@inscrire');
Route::POST('/InsertUser', 'App\Http\Controllers\Insert@InsertDbuser')->name('insert.user');
/*Route::get('/profile/{etudiants?}', function () {
    return view('profile');
});*/
Route::post('/code-register', 'App\Http\Controllers\FrontController@VerificationCodeRegister')->name('VerificationCodeRegister');

Route::get('/etudiants/{id}', 'App\Http\Controllers\Selecte@Etudiant');
Route::get('/clubs/{id}', 'App\Http\Controllers\Selecte@club');


Route::get('/inscrire', 'App\Http\Controllers\AddUserController@CreateUser');
Route::Post('/Save', 'App\Http\Controllers\AddUserController@Save')->name('ajax.SaveUser');

######### salim test #########

Route::post('/salim', 'App\Http\Controllers\salimtest@rech')->name('salim.test');
