<?php

use Illuminate\Http\Request;

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

Route::get('contacts', 'ContactsController@getAPIContacts');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('contact', 'API\Mycontacts@save');
Route::put('/edit/{id}', 'API\Mycontacts@update');
Route::delete('remove/{id}', 'API\Mycontacts@remove');
Route::get('contacts', 'ContactsController@index');

