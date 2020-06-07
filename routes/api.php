<?php

use Illuminate\Http\Request;
use App\Slist;
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
Route::group ([ 'middleware' => [ 'api' , 'cors' ]], function () {
    Route::post( 'auth/login' , 'Auth\ApiAuthController@login' );
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('slists', 'SlistController@index' );
Route::get('slist/{done}' , 'SlistController@findDone' );
Route::get( '/currentlist/{id}' , 'SlistController@findListById' );
Route::get( '/currentitem/{id}' , 'SlistController@findItemsOfList' );
//Route::get('auth/{user_id}', 'Auth\ApiAuthController@getUserById');
Route:: group ([ 'middleware' => [ 'api' , 'cors' , 'auth.jwt'] ], function (){
    Route::post ( 'auth/logout' , 'Auth\ApiAuthController@logout' );
    Route::post ( 'slist/feedback', 'SlistController@newFeedback');
    Route::get('auth/{id}', 'Auth\ApiAuthController@getUserById');

});
//Ausgelagert weil ein Fehler in der Authenficiation aufegtreten ist - token
//wird nicht mitgeliefert...
Route::post ( 'slist' , 'SlistController@save' );
//Funktioniert
Route::delete ( 'slist/{id}' , 'SlistController@delete' );
//Funktioniert leider nicht
Route::put('book/shoppingcart/{id}', 'SlistController@saveInTakenLists');
//Funktioniert
Route::put('slist/{id}', 'SlistController@update');
