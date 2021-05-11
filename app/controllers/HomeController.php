<?php

namespace App\Controller;

use Core\View;
use App\Controller\UserController;
use App\Controller\AccessController;

class HomeController
{
    public function __construct()
    {
        if(!$_SESSION['sid']){header('Location: /');}
    }

    public function index()
    {
        View::render('pages/home/index.php');
    }
}