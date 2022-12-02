<?php
require_once __DIR__."/../../vendor/autoload.php";
$router= new App\Router();
$router
    ->get('/', [App\Classes\Home::class,'index'])
    ->get('/invoice', [App\Classes\Invoice::class,'index'])
    ->get('/invoice/create', [App\Classes\Invoice::class,'create'])
    ->post('/invoice/create', [App\Classes\Invoice::class,'create']);


echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));