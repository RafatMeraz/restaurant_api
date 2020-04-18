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

$router->post('/insertOrder', ['middleware'=>'auth','uses'=>'OrderController@insertOrder']);

$router->get('/carts', ['middleware'=>'auth','uses'=>'CartController@getAllCarts']);

$router->post('/carts', ['middleware'=>'auth','uses'=>'CartController@addToCarts']);

$router->delete('/carts', ['middleware'=>'auth','uses'=>'CartController@deleteToCarts']);

$router->get('/tables', ['middleware'=>'auth','uses'=>'ReservationController@getAllDiningTable']);

$router->post('/tables', ['middleware'=>'auth','uses'=>'ReservationController@reserveTable']);
