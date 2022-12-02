<?php

namespace App\Exception;

class ViewNotFoundException extends \Exception
{
    protected $message='View Not Found';
    public function __construct()
    {
    }
}