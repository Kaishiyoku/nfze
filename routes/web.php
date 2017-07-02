<?php

Route::group(['middleware' => ['menus']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
});