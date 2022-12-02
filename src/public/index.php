<?php
session_abort();
require_once __DIR__."/../../vendor/autoload.php";
define('STORAGE_PATH', __DIR__.'/../storage');
define('VIEW_PATH', __DIR__.'/../views');

try {
    $router = new App\Router();
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->get('/invoice', [App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoice/create', [App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoice/create', [App\Controllers\InvoiceController::class, 'create']);


    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );
}catch (\App\Exception\RouteNotFoundException $e) {
    //header('HTTP/101 404 Not Found');
    http_response_code(404);
    echo \App\View::make('error/404');
}