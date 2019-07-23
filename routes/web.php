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

Route::group(['middleware' => 'auth'], function(){
  Route::get('communityrep', 'CommunityRepController@index');
  Route::get('communityrep/communitycreate', 'CommunityRepController@communityadd');
  Route::post('communityrep/communitycreate', 'CommunityRepController@communitycreate');
  Route::get('communityrep/communityedit', 'CommunityRepController@communityedit');
  Route::post('communityrep/communityedit', 'CommunityRepController@communityupdate');
  Route::get('communityrep/communitydelete', 'CommunityRepController@communitydelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ReadingPageController@toppage');

Route::get('community/page/{id}', 'ReadingPageController@communityshow');

Route::get('search','SearchController@index');
