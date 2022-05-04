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

Route::get('/clear-cache', function() {

    $configCache = Artisan::call('config:cache');
    $clearCache = Artisan::call('cache:clear');
    // return what you want
});

Route::group(['middleware' => 'guest'], function(){
    Route::group(['middleware' => 'revalidate'], function () {
        Route::get('/',              'HomeController@index')->name('login');
        Route::post('authenticate',  'HomeController@login');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'revalidate'], function () {
        Route::get('/dashboard', 'HomeController@dashboard');

        Route::post('logout',  'HomeController@logout')->name('logout');

        Route::get('logout2',  'HomeController@logout')->name('logout');

        Route::get('input-data',  'TeleMasterController@index');
        Route::get('display-data','TeleMasterController@list');
        Route::get('detail-data/{p1}','TeleMasterController@detail');
        Route::post('save-data',  'TeleMasterController@save');
        Route::post('update-data',  'TeleMasterController@update');
        Route::get('laporan',               'TeleMasterController@laporanSelection');
        Route::get('laporan-view/{p1}/{p2}','TeleMasterController@laporanView');
        
        Route::get('user',          'Setting\UserController@index');
        Route::get('user/create',   'Setting\UserController@create');
        Route::get('user/edit/{p1}',     'Setting\UserController@edit');
        Route::post('user/save',    'Setting\UserController@save');
        Route::post('user/update',  'Setting\UserController@update');
        Route::get('user/delete/{p1}',  'Setting\UserController@delete');
    });
});