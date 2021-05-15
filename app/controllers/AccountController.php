<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccessModel;
use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;
use App\Model\UserModel;

class AccountController extends Controller implements ControllerInterface {
    // каталог для загрузки юзерпиков
    public $img_path = 'images/accounts/';

    /**
     * Вывод аккаунтов
     *
     * @throws \Exception
     */
    public function show()
    {
        if($_SESSION['sid']){header('Location: /home');}

        else
        {
            $accounts = AccountModel::showAll();
            View::render('index.php', ['accounts' => $accounts]);
        }
    }

    /**
     * Вывод аккаунта по id
     *
     * @throws \Exception
     */
    public function getById()
    {
        $id = $_GET['id'];
        $account = new AccountModel();
        $result = $account->getById($id);

        View::render('pages/accounts/show.php', ['account' => $result]);
    }

    /**
     * Форма для редактирования аккаунта
     *
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_SESSION['said'];
        $account = new AccountModel();
        $result = $account->getById($id);

        View::render('pages/accounts/edit.php', ['account' => $result]);
    }

    /**
     * удаление по id
     *
     * @throws \Exception
     */
    public function deleteById()
    {
        $id =  $_GET['id'];

        $account = new AccountModel();
        $user_id = $account->getById($id)['user_id'];
        $account->deleteById($id);

        $user = new UserModel();
        $user->deleteById($user_id);

        View::render('crud_result/delete_result.php', ['back_url' => '/']);
    }

    /**
     * Обновление в таблице по id
     *
     * @throws \Exception
     */
    public function update()
    {
        $id = $_SESSION['said'];
        $date = date('Y-m-d H:i:s');
        $old_userpic = "/images/accounts/default.png";
        $account = new AccountModel();

        if (strlen($account->getById($id)['userpic']) > 0 and $account->getById($id)['userpic'] != "/images/accounts/default.png") //если в базе есть старая картинка, то поставить ее вместо дефолта
            $old_userpic = $account->getById($id)['userpic'];

        if (isset($_FILES['userpic']))
        {
            $userpic = $this->uploadImage($_FILES['userpic'], $this->img_path);
            if(strlen($userpic) > 0) $args['userpic'] = $userpic;
            else $userpic = $old_userpic;
        }

        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'userpic' => $userpic,
            'updated_at' => $date
        ];

        if (strlen($old_userpic) > 0 and $account->getById($id)['userpic'] != "/images/accounts/default.png" and $userpic != $old_userpic) //если в базе есть старая картинка, удалить ее
            $this->deleteImage($old_userpic);

        $account->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }

    /**
     * Регистрация нового акаунта
     */
    public function registration()
    {
        $userData = json_decode(file_get_contents('php://input'));
        $date = date('Y-m-d H:i:s');

        $user = new UserController();
        $user_id = $user->registration();

        if ($user_id != false)
        {
            $access_id= 1;
            $args = [
                'user_id' => $user_id,
                'access_id' => $access_id,
                'name' => $userData->name,
                'created_at' => $date,
                'updated_at' => $date,
                'userpic' => "/images/accounts/default.png"
            ];

            $account = new AccountModel();
            $account->store($args);

            $user->newSession($user_id);
            $this->newSession($account->getLastId());

            $access = new AccessController();
            $access->newSaccess($access_id);

            echo true;
        }

        else{echo false;}
    }

    /**
     * Берём аккаунт по user_id
     *
     * @param $user_id
     * @return mixed
     */
    public function getAccount($user_id)
    {
        $account = new AccountModel();

        return $account->getAccount($user_id);
    }

    /**
     * Создание новой Сессии
     *
     * @param $id
     */
    public function newSession($id)
    {
        $_SESSION['said'] = $id;
    }

    /**
     * @throws \Exception
     */
    public function accessManager()
    {
        $accounts = AccountModel::showAll();

        View::render('pages/accounts/index.php', ['accounts' => $accounts]);
    }


    public function accessUp()
    {
        // TODO: доделать уровень доступа вверх
        $accesses = new AccessModel();
        $accesses = $accesses->showAll();
        asort($accesses);

        $keys = array_keys($accesses);
        $position = array_search($_GET['access_id'], $keys);
        if (isset($keys[$position + 1])) {
            $nextKey = $keys[$position + 1];
        }
    }

    public function accessDown()
    {
        // TODO: доделать уровень доступа вниз
    }
}
