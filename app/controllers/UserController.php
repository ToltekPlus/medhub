<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\UserModel;
use App\Controller\AccessController;
use App\Controller\AccountController;

class UserController extends Controller {
    /**
     * Авторизация(проверка пароля)
     *
     * @return bool
     */
    public function auth()
    {
        $email = $_POST['userData']['email'];
        $password = md5($_POST['userData']['pass']);
        $result = false;

        $user = UserModel::showAuth($email);
        if($password == $user->password)
        {
            $this->newSession($user->id);

            $account = new AccountController();
            $access_id = $account->getAccount($user->id);

            $access = new AccessController();
            $access->newSaccess($access_id);

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
            'login' => $_POST['userData']['email'],
            'password' => md5($_POST['userData']['pass']),
            'created_at' => $date,
            'updated_at' => $date
        ];

        $user = new UserModel();
        if($user->authQuery($_POST['userData']['email']) != NONE)
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

    /**
     * Обновление в таблице по id
     *
     * @throws \Exception
     */
    public function update()
    {
        $id = $_SESSION['sid'];

        $args = [
            'password' => md5($_POST['password'])
        ];

        $user = new UserModel();

        $user->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }
}
