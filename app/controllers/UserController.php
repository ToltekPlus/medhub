<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\UserModel;

class UserController extends Controller {
    /**
     * Авторизация(проверка пароля)
     */
    public function auth()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = false;

        $user = UserModel::showAuth($email);
        if($password == $user->password)
        {
            $this->newSession($user->id);
            $result = true;
        }
        return $result;

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
     * Создание новой Сессии
     *
     * @param $id
     */
    public function newSession($id)
    {
        $_SESSION['sid'] = $id;
    }

    /**
     * выход из аккаунта
     */
    public function logout()
    {
        parent::logout();
    }
}
