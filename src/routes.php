<?php

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', array('uses' => 'Gilbitron\LaravelAppBoilerplate\AuthController@login'));
	Route::post('login', array('uses' => 'Gilbitron\LaravelAppBoilerplate\AuthController@processLogin'));
	Route::get('signup', array('uses' => 'Gilbitron\LaravelAppBoilerplate\AuthController@signup'));
	Route::post('signup', array('uses' => 'Gilbitron\LaravelAppBoilerplate\AuthController@processSignup'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', array('uses' => 'Gilbitron\LaravelAppBoilerplate\AuthController@logout'));
});
