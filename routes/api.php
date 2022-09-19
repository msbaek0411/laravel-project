<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', 'UserController@index');

Route::get('/test', 'TestZController@index');

Route::get('List', 'ListFileController@index');

Route::get('/chatlists', 'ChatListController@index');
Route::get('/chatlists/all', 'ChatListController@alldata');
Route::post('/chatlists', 'ChatListController@store');
Route::delete('/chatlists/{index}', 'ChatListController@destory');

Route::get('/issue', 'IssueController@index');


// Route::prefix('ChatList')->group(function(){
//     Route::post('/top', 'ChatListController@store');
//  });
