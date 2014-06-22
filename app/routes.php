<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);

Route::post('/', 'PasteController@create');

Route::get('/{hash}', ['as' => 'hash', 'uses' => 'PasteController@show'])
    ->where(['hash' => '[A-Za-z0-9]{4,}']);

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});