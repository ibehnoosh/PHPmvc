<?php

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private  Router $router;
    protected  function  setUp(): void
    {
        parent::setUp();
        $this->router= new Router();
    }
    public function  testItRegisterGetRoute():void
    {
        $this->router->get('/users', ['Users' , 'index']);
        $expected=[
            'get'=> [
                '/users' =>['Users','index'],
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());

    }

    public function  testItRegisterPostRoute():void
    {//
        $this->router->post('/users', ['Users' , 'store']);
        $expected=[
            'post'=> [
                '/users' =>['Users','store'],
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());

    }
    public function testThereAreNoRoutesWhenRouterIsCreated()
    {
        $this->assertEmpty($this->router->routes());
    }

}
