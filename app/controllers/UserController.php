<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\UserModel;

class UserController extends Controller {
    // TODO доделать номарльную авторизацию
    public function auth()
    {
        $email = $_POST('email');

        $user = UserModel::showAuth($email);
        $id = $user['id'];
        $password = $user['password'];

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
