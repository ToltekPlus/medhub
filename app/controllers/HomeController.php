<?php

namespace App\Controller;

use Core\View;
use App\Controller\UserController;

class HomeController
{
    public function __construct()
    {
        if ($_POST['email'])
        {
            $user = new UserController();
            $result = $user->auth();
        }
        if (!$_SESSION['sid'] or (!$result and $_POST['email'])) {header("Location: /");}
    }

    public function index()
    {
        View::render('pages/home/index.php');
    }

}