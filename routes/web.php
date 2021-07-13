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

Route::get('/', function () {
    return view('welcome');
});



Route::get('login', function()
{

  return view('login')
		 ->with('csrf_token', csrf_token());
});

Route::post('login', 'LoginController@utente');

Route::get ('logout', 'LoginController@esci');


Route::get('register','RegisterController@reg');
Route::post('register','RegisterController@registrazione');
Route::get("register/username/{q}", "RegisterController@checkUsername");
Route::get("register/email/{q}", "RegisterController@checkEmail");

Route::get ('home', 'HomeController@homepage');

Route::get ('prenotazioni', 'PrenotazioniController@prenotazioni');
Route::get ('prenotazioni/view', 'PrenotazioniController@caricamento');

Route::get ('covid_API', 'PrenotazioniController@covid_API');
Route::get ('geo_API', 'PrenotazioniController@geo_API');
