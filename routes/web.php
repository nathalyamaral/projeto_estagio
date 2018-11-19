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

Route::group(['prefix'=> 'api', 'middleware' => 'CheckConsistence'], function (){

    Route::get('/getArray', 'UserController@getArray');
    Route::get('/getVagas',  'VagasController@index');
    Route::post('/auth','UserController@CheckAuth');
    Route::resource('/Aluno', 'AlunoController');

});

Route::get('/', function () {
    return view('master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
