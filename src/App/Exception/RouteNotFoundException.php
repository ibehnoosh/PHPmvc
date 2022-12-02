<?php

namespace App\Exception;

class RouteNotFoundException extends \Exception
{
    protected $message='404 Not Found';
    public function __construct()
    {
    }
}