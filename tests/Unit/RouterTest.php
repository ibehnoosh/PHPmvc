<?php

namespace Tests\Unit;

use App\Exception\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private  Router $router;

    public function routeNotFoundCases(): array
    {
        return[
            ['/users','put'],
            ['/invoices','post'],
            ['/users','get'],
            ['/users','post']
        ];
    }

    protected function  setUp(): void
    {
        parent::setUp();
        $this->router= new Router();
    }
    public function testItRegisterGetRoute():void
    {
        $this->router->get('/users', ['Users' , 'index']);
        $expected=[
            'get'=> [
                '/users' =>['Users','index'],
            ]
        ];
        $this->assertEquals($expected, $this->router->routes());

    }
    public function testItRegisterPostRoute():void
    {
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
        $this->assertEmpty((new Router())->routes());
    }

    /**
     * @test
     * @dataProvider  routeNotFoundCases
     */
    public function testItThrowsRouteNotFoundException(
        string $requestUri,
        string $requestMethod
    ):void
    {
        $users= new class(){
            public function delete():bool{
                return true;
            }
        };
        $this->router->post('/users',[$users::class,'store']);
        $this->router->get('/users',['Users','index']);
        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri,$requestMethod);
    }
}
