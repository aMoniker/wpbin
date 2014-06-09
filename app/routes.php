<?php

Route::get('/', 'HomeController@home');

Route::get('/{hash}', function($hash) {
    $hash = strtolower($hash);
})
->where(['hash' => '[A-Za-z0-9]{4,}']);