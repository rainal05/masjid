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
    $info = \App\Berita::get();
    return view('welcome', compact('info'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'HakRole:Admin']], function () {

    Route::group(['prefix' => '/data/konten'],     function () {
        Route::get('/', 'KontenController@index');
        Route::post('/store', 'KontenController@store');
        Route::get('/detail/{id}', 'KontenController@detail');
        Route::get('/{id}', 'KontenController@edit');
        Route::post('/{id}/update', 'KontenController@update');
        // Route::get('/{id}/delete/', 'MasjidController@delete');
    });

    Route::group(['prefix' => '/data/akun'],     function () {
        Route::get('/', 'UserController@index');
        Route::post('/store', 'UserController@store');
        Route::get('/{id}', 'UserController@edit');
        Route::post('/{id}/update', 'UserController@update');
        Route::get('/{id}/delete/', 'UserController@delete');
    });

    Route::group(['prefix' => '/laporan'],     function () {
        Route::get('/', 'MasjidController@lap');
        Route::get('/masjid/{start}/{end}', 'MasjidController@lapmasjid');
    });
});

Route::group(['middleware' => ['auth', 'HakRole:0,Admin']], function () {

    //belum
    Route::group(['prefix' => '/data/masjid'],     function () {
        Route::get('/', 'MasjidController@index');
        Route::get('/acc', 'MasjidController@acc');
        Route::post('/store', 'MasjidController@store');
        Route::get('/{id}/delete/', 'MasjidController@delete');
        Route::get('/detail/{id}', 'MasjidController@detail');
        Route::get('/acc/{id}', 'AccController@acc');
        Route::post('/acc/{id}/update', 'AccController@update');
    }); 
});
