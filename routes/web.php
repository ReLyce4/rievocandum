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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/landing', 'LandingController@index')->name('landing');
Auth::routes();
Route::get('/profile/{name}', 'ProfileController@show')->name('profile');

Route::get('note/add', 'NoteController@addInfo')->name('note.add');
Route::post('note/add', 'NoteController@write')->name('note.add');

Route::post('note/save', 'NoteController@save')->name('note.save');
//Route::get('note/save', 'NoteController@save')->name('note.save');

Route::get('/', function () {
	if(Auth::check()) {
		return redirect('home');
	} else {
		return redirect('landing');
	}
});