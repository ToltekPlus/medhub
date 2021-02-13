<?php

use Core\Router;

$router = new Router();
$router->add('', ['controller' => 'AccountController', 'action' => 'show']);
$router->add('account?{id}', ['controller' => 'AccountController', 'action' => 'getById']);
$router->add('account/delete?{id}', ['controller' => 'AccountController', 'action' => 'deleteById']);
$router->add('account/edit?{id}', ['controller' => 'AccountController', 'action' => 'edit']);
$router->add('account/update', ['controller' => 'AccountController', 'action' => 'update']);

$router->add('account/login?{id}', ['controller' => 'UserController', 'action' => 'getSession']); // линк для примера. Использоваться не будет TODO после изучения удалить
$router->add('logout', ['controller' => 'UserController', 'action' => 'logout']);

$router->dispatch($_SERVER['QUERY_STRING']);