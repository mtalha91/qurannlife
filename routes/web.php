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

Route::get('/', 'QuranView');
Route::get('/about', 'QuranView@about');
Route::get('/privacy-policy‎', 'QuranView@privacy');
Route::get('/terms-and-service', 'QuranView@terms');
Route::get('chapters/{surah_id}', 'QuranView@surah');
Route::get('chapters/{surah_id}/ayat/{ayat_id}/{verse_key}', 'QuranView@ayat');
Route::post('generatedimage','QuranView@generatedimage');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/test','FirebaseController@index');