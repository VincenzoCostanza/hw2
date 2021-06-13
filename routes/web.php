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

Route::get('login','LoginController@login');
Route::post('login','LoginController@CheckLogin');
Route::get('logout','LoginController@logout');
Route::get('home','HomeController@home');
Route::post('login','LoginController@checkLoginjs');

Route::get('registrazione','registrazioneController@registrazione');
Route::post('registrazione','registrazioneController@checkRegistrazione');
Route::get('controllousername/{username}','registrazioneController@checkUsername');

Route::get('caricamento_articoli','HomeController@articoli');
Route::get('LikePost/{id_post}','LikeController@like');
Route::get('unlikePost/{id_post}','LikeController@unlike');
Route::get('caricamento_competizioni','competizioniController@inserisciCompetizioni');
Route::get('GuardaLike/{post_id}','LikeController@GuardaLike');
Route::get('VedereCommentiPrecedenti/{id_post}','CommentController@VedereCommentiPrecedenti');
Route::get('sostituisciConUsername/{user_id}','CommentController@sostituisciConUsername');

Route::get('InserisciCommento/{commento}/{id_post}','CommentController@InserisciCommento');
Route::get('NumCommenti/{id_post}','CommentController@num_commenti');
Route::get('inserisciInPreferiti/{nome_compe}/{img_compe}','HomeController@inserisciInPreferiti');
Route::get('preferiti','HomeController@preferiti');
Route::get('info','HomeController@info');
Route::get('competizioni','HomeController@competizioni');
Route::get('partite_quot','HomeController@partite_quot');
Route::get('partite_giornaliere','partitequotController@partite_giornaliere');

Route::get('prendiIpreferiticompetizioni','preferitiController@prendiIpreferiticompetizioni');
Route::get('prendiIpreferitiPost','preferitiController@prendiIpreferitiPost');
Route::get('rimuoviDaiPreferiti/{titolo}/{img}','HomeController@rimuoviDaiPreferiti');

