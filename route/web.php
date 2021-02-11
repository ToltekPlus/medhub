<?php

use Core\Router;

$router = new Router();
$router->add('', ['controller' => 'AccountController', 'action' => 'show']);
$router->add('account?{id}', ['controller' => 'AccountController', 'action' => 'getById']);
$router->add('account/delete?{id}', ['controller' => 'AccountController', 'action' => 'deleteById']);
$router->add('account/edit?{id}', ['controller' => 'AccountController', 'action' => 'edit']);
$router->add('account/update', ['controller' => 'AccountController', 'action' => 'update']);

$router->dispatch($_SERVER['QUERY_STRING']);