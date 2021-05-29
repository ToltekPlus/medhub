<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\UserModel;

class UserController extends Controller {
    /**
     * Авторизация(проверка пароля)
     *
     * @return bool
     */
    public function auth()
    {
        $userData = json_decode(file_get_contents('php://input'));

        $email = $userData->email;
        $password = md5($userData->pass);
        $result = false;

        $user = UserModel::showAuth($email);
        if($password == $user->password)
        {
            $this->newSession($user->id);

            $account = new AccountController();
            $access_id = $account->getAccount($user->id)->access_id;
            $account->newSession($account->getAccount($user->id)->id);

            $access = new AccessController();
            $access->newSaccess($access_id);

            $result = true;
        }

        echo $result;
    }

    /**
     * Регистрация нового юзера
     * @return mixed
     */
    static function registration()
    {
        $userData = json_decode(file_get_contents('php://input'));
        $date = date('Y-m-d H:i:s');
        $args = [
            'login' => $userData->email,
            'password' => md5($userData->pass),
            'created_at' => $date,
            'updated_at' => $date
        ];

        $user = new UserModel();
        if(!$user->showAuth($userData->email))
        {
            $user->store($args);
            return $user->getLastId();
        }
        else{return false;}
    }

    /**
     * якобы передача сессии
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
