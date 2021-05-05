<?php

namespace App\Controller;

use Core\View;

class HomeController
{
    public function __construct()
    {
        //if (!$_SESSION['uid']) {View::render('index.php');}
    }

    public function index()
    {
        View::render('pages/home/index.php');
    }

}