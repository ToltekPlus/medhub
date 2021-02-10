<?php

use Core\Router;

$router = new Router();
$router->add('', ['controller' => 'AccountController', 'action' => 'show']);
$router->add('account?{id}', ['controller' => 'AccountController', 'action' => 'getById']);
$router->add('account/delete?{id}', ['controller' => 'AccountController', 'action' => 'deleteById']);

$router->dispatch($_SERVER['QUERY_STRING']);