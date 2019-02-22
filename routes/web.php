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
Route::get('chapters/{surah_id}', 'QuranView@surah');
Route::get('chapters/{surah_id}/ayat/{ayat_id}', 'QuranView@ayat');
Route::post('generatedimage','QuranView@generatedimage');