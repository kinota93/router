<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

 // Static route: /hello
 $router->get('/', function () {
    echo '<h1>Hello World!</h1>';
});

// Subrouting
$router->mount('/site', function () use ($router) {

    // will result in '/sites'
    $router->get('/', function () {
        echo ' sites overview';
    });

    // will result in '/sites'
    $router->post('/', function () {
        echo 'add site';
    });

    // will result in '/site/id'
    $router->get('/(\w+)', function ($id) {
        echo 'site id ' . htmlentities($id);
    });

    // will result in '/sites/id'
    $router->put('/(\w+)', function ($id) {
        echo 'Update site id ' . htmlentities($id);
    });
});

// Run it!
$router->run();