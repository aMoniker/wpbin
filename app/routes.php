<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);

Route::post('/', 'PasteController@create');

Route::get('/{hash}', ['as' => 'hash', function($hash) {
    $hash = strtolower($hash);
    var_dump('hash route', $hash);
}])
->where(['hash' => '[A-Za-z0-9]{4,}']);