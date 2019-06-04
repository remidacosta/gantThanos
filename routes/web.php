<?php

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

Route::get('/listePersonnes','PersonneController@getLesPersonnes');
Route::post('/listePersonnes','PersonneController@getLesPersonnes');
//Route::get('/ajoutPersonne','PersonneController@ajoutPersonne');
Route::post('/ajoutPersonne','PersonneController@ajoutPersonne');
Route::post('/insertionPersonne','PersonneController@postAjoutPersonne');
Route::get('/modifierPersonne/{n}','PersonneController@modifierPersonne');
Route::post('/modifierPersonne/{n}','PersonneController@postModifierPersonne');
Route::post('/supprimerPersonne/{n}','PersonneController@supprimerPersonne');
