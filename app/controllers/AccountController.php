<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;
use App\Model\UserModel;
use App\Controller\AccessController;

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
        $accounts = AccountModel::showAll();

        View::render('index.php', ['accounts' => $accounts]);
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
        $id = $_GET['id'];
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
        $id = $_SESSION['sid'];

        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
        ];

        if (isset($_FILES['userpic']))
            $userpic = $this->uploadImage($_FILES['userpic'], $this->img_path);
            $args['userpic'] =  $userpic;


        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'userpic' => $userpic 
        ];

        $account = new AccountModel();

        if (strlen($account->getById($id)['userpic']) > 0) //если в базе есть старая картинка, удалить ее
            $this->deleteImage($account->getById($id)['userpic']);

        $account->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }

    /**
     * Регистрация нового акаунта
     */
    static function registration()
    {
        $date = date('Y-m-d H:i:s');

        $user = new UserController();
        $user_id = $user->registration();
        $access_id = 1;

        if ($user_id != false)
        {
            $args = [
                'user_id' => $user_id,
                'access_id' => $access_id,
                'name' => $_POST['new-name'],
                'created_at' => $date,
                'updated_at' => $date
            ];

            $account = new AccountModel();
            $account->store($args);

            $user->newSession($user_id);

            $access = new AccessController();
            $access->newSaccess($access_id);

            return true;
        }

        else{return false;}
    }
}
