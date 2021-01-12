<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    $xml = simplexml_load_file('http://10.0.0.195:3000/12-01-2021/shiporders.xml');
    foreach($xml as $row){
        var_dump($row);
        echo "<br><br><br>";
    }
});

$router->get('/', function () use ($router) {
    
    return $router->app->version();
    /*$xml = simplexml_load_file('http://10.0.0.195:3000/12-01-2021/shiporders.xml');
    foreach($xml as $row){
        var_dump($row);
        echo "<br><br><br>";
    }*/
});
