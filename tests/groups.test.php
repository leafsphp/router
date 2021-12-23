<?php

use Leaf\Router;

class TGroup
{
    static $val = true;
}

test('route groups', function () {
    $_SERVER['REQUEST_URI'] = '/group/route';

    $router = new Router;

    TGroup::$val = true;

    $router->mount('/group', function () use ($router) {
        $router->get('/route', function () {
            TGroup::$val = false;
        });
    });

    $router->run();

    expect(TGroup::$val)->toBe(false);
});

test('route groups with array', function () {
    $_SERVER['REQUEST_URI'] = '/group/route';

    $router = new Router;

    TGroup::$val = true;

    $router->mount('/group', [function () use ($router) {
        $router->get('/route', function () {
            TGroup::$val = false;
        });
    }]);

    $router->run();

    expect(TGroup::$val)->toBe(false);
});

test('route groups with namespace', function () {
    $_SERVER['REQUEST_URI'] = '/group/route';

    $router = new Router;

    $router->mount('/group', ['namespace' => 'App\Controllers', function () use ($router) {
        $router->get('/route', 'ExampleController');
    }]);

    $router->run();

    // check if the namespace was registered
    expect(strpos(
        json_encode($router->routes()),
        'App\\\\Controllers\\\\ExampleController'
    ))->toBeTruthy();
});

test('route groups with different namespace', function () {
    $_SERVER['REQUEST_URI'] = '/group/route';

    $router = new Router;
    $router->setNamespace('Controllers');

    TGroup::$val = true;

    $router->mount('/group', ['namespace' => 'App\Controllers', function () use ($router) {
        $router->get('/route', 'ExampleController');
    }]);

    $router->run();

    // check if the App\Controllers namespace was registered
    // instead of the global Controllers namespace
    expect(strpos(
        json_encode($router->routes()),
        'App\\\\Controllers\\\\ExampleController'
    ))->toBeTruthy();
});
