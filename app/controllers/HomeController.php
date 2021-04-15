<?php

namespace App\Controller;

use Core\View;
use App\Controller\UserController;
use App\Controller\AccessController;

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
        if($_GET['id']){$_SESSION['sid'] = $_GET['id'];} //тесты, нада убрать

        if($_GET['access'])
        {
            $access = new AccessController();
            $access->newSaccess($_GET['access']);
        } //тесты, нада убрать

        View::render('pages/home/index.php');
    }
}