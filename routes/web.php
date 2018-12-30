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
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/import', 'HomeController@import')->name('home.import');
    Route::post('/import', 'HomeController@actionImport')->name('home.actionImport');

    Route::get('/analysis', 'HomeController@analysis')->name('home.analysis');
    Route::post('/analysis', 'HomeController@actionAnalysis')->name('home.actionAnalysis');
});
