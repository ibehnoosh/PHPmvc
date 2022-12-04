<?php

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function  testItRegisterGetRoute():void
    {
        $router=new Router();
        $router->get('/users', ['Users' , 'index']);
        $expected=[
            'get'=> [
                '/users' =>['Users','index'],
            ]
        ];
        $this->assertEquals($expected, $router->routes());

    }

    public function  testItRegisterPostRoute():void
    {
        $router=new Router();
        $router->post('/users', ['Users' , 'store']);
        $expected=[
            'post'=> [
                '/users' =>['Users','store'],
            ]
        ];
        $this->assertEquals($expected, $router->routes());

    }
}
