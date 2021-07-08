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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'EventController@index');
Route::post('/home', 'EventController@store');
Auth::routes();



/*管理者のみ許可
*/
Route::group(['middleware' => ['auth', 'can:admin']], function () {
 Route::get('/admin', function () {
   return view('admin');
 
 });

 Route::post('/register', 'Auth\RegisterController@register'); 
 
 
});


