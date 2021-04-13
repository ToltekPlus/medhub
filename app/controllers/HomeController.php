<?php

namespace App\Controller;

use Core\View;
use App\Controller\UserController;

class HomeController
{
    public function __construct()
    {
        $result = false;

        if ($_POST['email'])
        {
            $user = new UserController();
            $result = $user->auth();
        }

        return $result;
    }

    public function index()
    {
        View::render('pages/home/index.php');
    }

}