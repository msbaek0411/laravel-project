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
    return view('Main');
});

Auth::routes();


Route::get('/admin', function () {
    return view('AdminPage');
});


Route::get('/MusicList/MainHome', function () {
    return view('MainHome');
});


Route::get('/MusicList', function () {
    return view('MusicList');
});

Route::get('/MusicList/new', function () {
    return view('new');
});

Route::get('/MusicList/top', function () {
    return view('top');
});



Route::get('/test', function () {
    return view('test');
});
