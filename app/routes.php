<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);

Route::post('/', 'PasteController@create');

Route::get('/{hash}', ['as' => 'hash', 'uses' => 'PasteController@show'])
    ->where(['hash' => '[A-Za-z0-9]{4,}']);