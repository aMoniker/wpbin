<?php

Route::get('/', 'HomeController@home');

Route::get('/', function()
{
	return View::make('hello');
});
