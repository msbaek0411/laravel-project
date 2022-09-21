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
Route::get('/admin/user/{id}','AdminController@show');
Route::get('/admin/createuser','AdminController@create');
Route::post('/admin/createuser','AdminController@store');
Route::get('/admin/user/{id}/edit','AdminController@edit');
Route::put('/admin/user/{id}','AdminController@update');



Route::get('/admin/issue/createuser','AdminIssueController@create');
Route::post('/admin/issue/createuser','AdminIssueController@store');
Route::get('/admin/issue/{id}/edit','AdminIssueController@edit');
Route::put('/admin/issue/{id}','AdminIssueController@update');

// api (axios) 수정
// Route::delete('/admin/user/{id}','AdminController@destory');


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
