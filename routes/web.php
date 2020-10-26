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
    return view('home');
});

Auth::routes();

Route::get('/home', 'ContactsController@index');
Route::get('/viewRecords', 'ContactsController@show');
Route::get('/userhome', 'ContactsController@show');
Route::get('/userhomepage', 'ContactsController@show');



Route::get('/edit', function()
{
	return view('edit');
});

Route::get('click_edit/{id}', 'ContactsController@editform');
Route::get('click_delete/{id}', 'ContactsController@deleteform');

Route::get('/addcontact', function(){
	return view('addContacts');
});


Route::post('/update/{id}', 'ContactsController@update');
Route::post('/submit', 'ContactsController@store');

Route::get('{any}', function (){
	return view ('app');
})->where('any', '.*');


Route::resource('contacts', 'ContactsController');
