<?php

$app->get('/', [
    'as' => 'home.index', 'uses' => 'HomeController@index'
]);