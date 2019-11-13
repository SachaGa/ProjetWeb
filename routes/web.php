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

use App\Http\Controllers\PagesController;

Route::get('/', 'PagesController@Acceuil');
Route::get('/activites', 'PagesController@Activites');
Route::get('/boutique', 'PagesController@Boutique');
Route::get('/contact', 'PagesController@Contact');
Route::get('/evenements', 'PagesController@Evenements');
Route::get('/mentions', 'PagesController@Mentions');
Route::get('/manifestations', 'PagesController@Manifestations');
Route::get('/confidentialité', 'PagesController@Confidentialité');
Route::get('/dashboard', 'DashboardController@index');

Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('manifestations', 'ManifestationsController');

