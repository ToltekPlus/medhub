<?php

/*
--------------------------------------------------------------------------
Маршрутизация
Здесь описаны роуты и контроллеры с методами которые они обрабатывают
--------------------------------------------------------------------------
*/

use Core\Router;

$router = new Router();

/*
--------------------------------------------------------------------------
Входная точка и статичные страницы
--------------------------------------------------------------------------
*/
$router->add('', ['controller' => 'AccountController', 'action' => 'show']);

/*
--------------------------------------------------------------------------
Работа с авторизацией/регистрацией
--------------------------------------------------------------------------
*/
$router->add('home', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('logout', ['controller' => 'UserController', 'action' => 'logout']);
$router->add('login', ['controller' => 'UserController', 'action' => 'auth']);
$router->add('registration', ['controller' => 'AccountController', 'action' => 'registration']);

/*
--------------------------------------------------------------------------
Работа с аккаунтом
--------------------------------------------------------------------------
*/
$router->add('account?{id}', ['controller' => 'AccountController', 'action' => 'getById']);
$router->add('account/delete?{id}', ['controller' => 'AccountController', 'action' => 'deleteById']);
$router->add('account/edit', ['controller' => 'AccountController', 'action' => 'edit']);
$router->add('account/update', ['controller' => 'AccountController', 'action' => 'update']);

/*
--------------------------------------------------------------------------
Работа с уровнем доступа к аккаунту
--------------------------------------------------------------------------
*/
$router->add('access-up', ['controller' => 'AccountController', 'action' => 'accessManager']);
$router->add('access-up/up?{id}', ['controller' => 'AccountController', 'action' => 'accessUp']);
$router->add('access-up/down?{id}', ['controller' => 'AccountController', 'action' => 'accessDown']);
$router->add('change-password', ['controller' => 'AccountController', 'action' => 'changePassword']);

/*
--------------------------------------------------------------------------
Работа с уровнем доступа
--------------------------------------------------------------------------
*/
$router->add('accesses', ['controller' => 'AccessController', 'action' => 'index']);
$router->add('access/add', ['controller' => 'AccessController', 'action' => 'show']);
$router->add('access/store', ['controller' => 'AccessController', 'action' => 'store']);
$router->add('access/edit?{id}', ['controller' => 'AccessController', 'action' => 'edit']);
$router->add('access/update', ['controller' => 'AccessController', 'action' => 'update']);
$router->add('access/warning?{id}', ['controller' => 'AccessController', 'action' => 'warning']);
$router->add('access/delete?{id}', ['controller' => 'AccessController', 'action' => 'delete']);


/*
--------------------------------------------------------------------------
Работа с категориями врачей
--------------------------------------------------------------------------
*/
$router->add('doctor_directions', ['controller' => 'DoctorDirectionController', 'action' => 'index']);
$router->add('doctor_directions/add', ['controller' => 'DoctorDirectionController', 'action' => 'show']);
$router->add('doctor_directions/store', ['controller' => 'DoctorDirectionController', 'action' => 'store']);
$router->add('doctor_directions/edit?{id}', ['controller' => 'DoctorDirectionController', 'action' => 'edit']);
$router->add('doctor_directions/update', ['controller' => 'DoctorDirectionController', 'action' => 'update']);
$router->add('doctor_directions/warning?{id}', ['controller' => 'DoctorDirectionController', 'action' => 'warning']);
$router->add('doctor_directions/delete?{id}', ['controller' => 'DoctorDirectionController', 'action' => 'delete']);


/*
--------------------------------------------------------------------------
Работа с подкатегориями
--------------------------------------------------------------------------
*/
$router->add('directions_category', ['controller' => 'DirectionsCategoryController', 'action' => 'index']);
$router->add('directions_category/add', ['controller' => 'DirectionsCategoryController', 'action' => 'show']);
$router->add('directions_category/store', ['controller' => 'DirectionsCategoryController', 'action' => 'store']);
$router->add('directions_category/edit?{id}', ['controller' => 'DirectionsCategoryController', 'action' => 'edit']);
$router->add('directions_category/update', ['controller' => 'DirectionsCategoryController', 'action' => 'update']);
$router->add('directions_category/warning?{id}', ['controller' => 'DirectionsCategoryController', 'action' => 'warning']);
$router->add('directions_category/delete?{id}', ['controller' => 'DirectionsCategoryController', 'action' => 'delete']);

/*
--------------------------------------------------------------------------
Работа с категориями
--------------------------------------------------------------------------
*/
$router->add('categories', ['controller' => 'CategoryController', 'action' => 'index']);
$router->add('categories/add', ['controller' => 'CategoryController', 'action' => 'show']);
$router->add('categories/store', ['controller' => 'CategoryController', 'action' => 'store']);
$router->add('categories/edit?{id}', ['controller' => 'CategoryController', 'action' => 'edit']);
$router->add('categories/update', ['controller' => 'CategoryController', 'action' => 'update']);
$router->add('categories/warning?{id}', ['controller' => 'CategoryController', 'action' => 'warning']);
$router->add('categories/delete?{id}', ['controller' => 'CategoryController', 'action' => 'delete']);

$router->add('account/login?{id}', ['controller' => 'UserController', 'action' => 'getSession']);
$router->dispatch($_SERVER['QUERY_STRING']);
