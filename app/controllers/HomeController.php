<?php

namespace App\Controller;

use Core\View;

class HomeController
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        if(!$_SESSION['sid']){header('Location: /');}
    }

    /**
     * @throws \Exception
     */
    public function index()
    {
        View::render('pages/home/index.php');
    }
}