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

Route::get('note/add', 'NoteController@addInfo')->name('note.add')->middleware('auth');
Route::post('note/add', 'NoteController@add')->name('note.add')->middleware('auth');
Route::get('note/remove', 'NoteController@remove')->name('note.remove')->middleware('auth');
Route::post('note/remove', 'NoteController@remove')->name('note.remove')->middleware('auth');
Route::get('note/write', 'NoteController@write')->name('note.write')->middleware('auth');
Route::get('note/list/{name}', 'NoteController@list')->name('note.list')->middleware('auth');
Route::get('note/explore', 'NoteController@search')->name('note.explore')->middleware('auth');
Route::get('note/view', 'NoteController@view')->name('note.view')->middleware('auth');
Route::get('note/search', 'NoteController@search')->name('note.search')->middleware('auth');
Route::post('note/save', 'NoteController@save')->name('note.save')->middleware('auth');

Route::get('flashcard/add', 'FlashcardController@addInfo')->name('flashcard.add')->middleware('auth');
Route::post('flashcard/add', 'FlashcardController@add')->name('flashcard.add')->middleware('auth');
Route::get('flashcard/remove', 'FlashcardController@remove')->name('flashcard.remove')->middleware('auth');
Route::post('flashcard/remove', 'FlashcardController@remove')->name('flashcard.remove')->middleware('auth');
Route::get('flashcard/write', 'FlashcardController@write')->name('flashcard.write')->middleware('auth');
Route::get('flashcard/list/{name}', 'FlashcardController@list')->name('flashcard.list')->middleware('auth');
Route::get('flashcard/explore', 'FlashcardController@search')->name('flashcard.explore')->middleware('auth');
Route::get('flashcard/view', 'FlashcardController@view')->name('flashcard.view')->middleware('auth');
Route::get('flashcard/search', 'FlashcardController@search')->name('flashcard.search')->middleware('auth');
Route::post('flashcard/save', 'FlashcardController@save')->name('flashcard.save')->middleware('auth');

Route::get('/', function () {
	if(Auth::check()) {
		return redirect('home');
	} else {
		return redirect('landing');
	}
});