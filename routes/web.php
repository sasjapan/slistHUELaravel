<?php
use App\Slist;

Route::get( '/' , 'SlistController@index' );
Route::get( '/slists' , 'SlistController@index' );
Route::get( '/slists/{slist}' , 'SlistController@show' );
Route::get( '/slist/{done}' , 'SlistController@findDone' );
Route::get( '/currentlist/{id}' , 'SlistController@findListById' );


Route::get ( '/slists' , function () {
    $slists = DB::table ('slists' )->get ();
return view ( 'welcome' , compact ( 'slists' ));
});

Route::get( '/slist/{id}' , function ($id) {
    $slist = DB::table('slists')->where('id', $id)->first();
    //dd($slist);
    return view('show', compact ( 'slist' ));
});


