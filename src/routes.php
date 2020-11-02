<?php
$app->get('/house-ads', 'HouseAdController@index');
$app->get('/house-ads/{id}', 'HouseAdController@show'); // For debug
$app->put('/house-ads/{id}', 'HouseAdController@update');