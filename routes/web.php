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

// Route::get('/', function () {
//     return view('site');
// });



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','Project@welcome')->name('Home');
Route::get('/home', 'Project@index');
Route::get('/create','Project@create');
Route::post('/store','Project@store');
Route::get('/show/{id}','Project@show');
Route::get('/edit/{id}','Project@edit');
Route::patch('/update/{id}','Project@update');
Route::delete('/destroy/{id}','Project@destroy');
Route::delete('/Harddelete/{id}','Project@Harddelete');
