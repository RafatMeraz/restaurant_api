<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register', 'CustomerController@createUser');

$router->post('/login', 'CustomerController@loginUser');

$router->post('/updateNamePhone', ['middleware'=>'auth','uses'=>'CustomerController@changeUserNamePhone']);

$router->post('/changePassword', ['middleware'=>'auth','uses'=>'CustomerController@changePassword']);

$router->get('/menu', ['middleware'=>'auth','uses'=>'FoodController@getAllMenus']);

$router->get('/foods', ['middleware'=>'auth','uses'=>'FoodController@getAllFoods']);

$router->get('/menuFoods', ['middleware'=>'auth','uses'=>'FoodController@getSelectedMenuFoods']);
