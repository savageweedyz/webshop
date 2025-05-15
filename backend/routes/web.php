<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/products', 'ProductController@getAll');
    $router->get('/products/{id}', 'ProductController@getById');
    $router->get('/products/{category}', 'ProductController@getByCategory');
    $router->post('/cart', 'CartController@addToCart');
});