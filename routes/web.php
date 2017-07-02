<?php

Route::group(['middleware' => ['menus']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about_me', 'HomeController@about_me')->name('home.about_me');
});