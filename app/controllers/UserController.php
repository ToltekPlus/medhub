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
        $password = md5($_POST['password']);
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
     * Регистрация нового юзера
     * @return mixed
     */
    static function registration()
    {
        $date = date('Y-m-d H:i:s');
        $args = [
            'login' => $_POST['new-email'],
            'password' => md5($_POST['new-password']),
            'created_at' => $date,
            'updated_at' => $date
        ];

        $user = new UserModel();
        if($user->authQuery($_POST['new-email']) != NONE)
        {
            $user->store($args);
            return $user->getLastId();
        }
        else{return false;}
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
