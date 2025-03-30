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


//Route::get('/', 'App\Http\Controllers\FrontController@Index0');

Route::get('/etudiants', 'App\Http\Controllers\FrontController@ListeEtudiants');
Route::get('/clubs', 'App\Http\Controllers\FrontController@ListeClubs');
Route::get('/evenments', 'App\Http\Controllers\FrontController@ListeEvenements');
Route::get('/formations', 'App\Http\Controllers\FrontController@ListeFormations');
Route::get('/', 'App\Http\Controllers\FrontController@Liste3Evenements');
//Route::get('/login', function () {
  //  return view('login');});

// route to show the login form


// route to process the form
Route::get('login', array('uses' => 'App\Http\Controllers\FrontController@showLogin'));
Route::get('authenticate', array('uses' => 'App\Http\Controllers\FrontController@authenticate'));


Route::get('logout', array('uses' => 'App\Http\Controllers\FrontController@logout'));


//Route::get('/inscrire', 'App\Http\Controllers\Insert@inscrire');
Route::POST('/InsertUser', 'App\Http\Controllers\Insert@InsertDbuser')->name('insert.user');
/*Route::get('/profile/{etudiants?}', function () {
    return view('profile');
});*/
Route::post('/code-register', 'App\Http\Controllers\FrontController@VerificationCodeRegister')->name('VerificationCodeRegister');

Route::get('/etudiants/{id}', 'App\Http\Controllers\FrontController@Etudiant');
Route::get('/clubs/{id}', 'App\Http\Controllers\FrontController@club');
Route::get('/joindreclub/{id_club}', 'App\Http\Controllers\FrontController@joindreClub')->name('joindreclub');
Route::get('/ChargerCommentairesClub/{id}', 'App\Http\Controllers\FrontController@ChargerCommentairesClub');

Route::get('/publications/{id}', 'App\Http\Controllers\FrontController@showpublication');
Route::get('/participPublic/{id}', 'App\Http\Controllers\FrontController@participPublic');
Route::get('/saveRating', 'App\Http\Controllers\FrontController@saveRating')->name('saveRating');

Route::post('/clubcommentaires', 'App\Http\Controllers\FrontController@clubCommentaires')->name('clubCommentaires');

//Route::get('/inscrire', 'App\Http\Controllers\FrontController@CreateUser');
//Route::post('/Save', 'App\Http\Controllers\FrontController@registerUser')->name('ajax.SaveUser');

Route::get('/inscrire', 'App\Http\Controllers\AddUserController@CreateUser');
Route::post('/Save', 'App\Http\Controllers\AddUserController@Save')->name('ajax.SaveUser');

Route::get('/monprofil', 'App\Http\Controllers\FrontController@monprofil');
Route::post('/upateProfile', 'App\Http\Controllers\FrontController@upateProfile')->name('upateProfile');

Route::get('/cv', 'App\Http\Controllers\FrontController@formcv');
Route::post('/saveCv', 'App\Http\Controllers\FrontController@saveCv')->name('saveCv');

Route::get('/creationclub', 'App\Http\Controllers\FrontController@creationclub');
Route::post('/savecreationclub', 'App\Http\Controllers\FrontController@savecreationclub')->name('savecreationclub');

######### salim test #########

Route::post('/salim', 'App\Http\Controllers\salimtest@rech')->name('salim.test');
