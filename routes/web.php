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
Route::get('/profile/{name}', 'ProfileController@show')->name('profile')->middleware('auth');

Route::get('note/add', 'NoteController@addInfo')->name('note.add')->middleware('auth');
Route::post('note/add', 'NoteController@write')->name('note.add')->middleware('auth');
Route::get('note/list', 'NoteController@search')->name('note.list')->middleware('auth');
Route::get('note/explore', 'NoteController@search')->name('note.explore')->middleware('auth');
Route::get('note/open/{file_name}', 'NoteController@open')->name('note.open')->middleware('auth');
Route::get('note/search', 'NoteController@search')->name('note.search')->middleware('auth');

Route::post('note/save', 'NoteController@save')->name('note.save')->middleware('auth');
//Route::get('note/save', 'NoteController@save')->name('note.save');

Route::get('/', function () {
	if(Auth::check()) {
		return redirect('home');
	} else {
		return redirect('landing');
	}
});