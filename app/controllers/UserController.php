<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\UserModel;

class UserController extends Controller {
    // TODO доделать номарльную авторизацию
    public function auth()
    {
        $user = UserModel::showAuth();

        echo "USER - " . $user->login . " с ID " . $user->id;
    }

    /**
     * якобы передача сессии
     * TODO после метод удалить
     */
    public function getSession()
    {
        $_SESSION['sid'] = $_GET['id'];
        header('Location: /');
    }

    /**
     * выход из аккаунта
     */
    public function logout()
    {
        parent::logout();
    }
}
