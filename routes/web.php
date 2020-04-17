<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return "Welcome to restaurant Rest API";
});

$router->post('/register', 'CustomerController@createUser');

$router->post('/login', 'CustomerController@loginUser');

$router->put('/updateNamePhone', ['middleware'=>'auth','uses'=>'CustomerController@changeUserNamePhone']);

$router->put('/changePassword', ['middleware'=>'auth','uses'=>'CustomerController@changePassword']);

$router->get('/menu', ['middleware'=>'auth','uses'=>'FoodController@getAllMenus']);

$router->get('/foods', ['middleware'=>'auth','uses'=>'FoodController@getAllFoods']);

$router->get('/menuFoods', ['middleware'=>'auth','uses'=>'FoodController@getSelectedMenuFoods']);

$router->get('/foodDetails', ['middleware'=>'auth','uses'=>'FoodController@getFoodItemDetails']);
