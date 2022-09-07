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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/TestList', 'HomeController@TestList')->name('TestList1');

Route::get('/List', 'HomeController@List')->name('TestList2');

Route::get('/TEST', function(){
    return view('test');
});

Route::get('/MusicList', 'HomeController@MusicList');

Route::get('/MusicList/new', 'HomeController@new');
Route::get('/MusicList/top', 'HomeController@top');
