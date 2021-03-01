<?php

namespace App\Controller;

use App\Handler\Controller;
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
        $id = $id = $_GET['id'];
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
        $id = $_POST['id'];

        $account = new AccountModel();

        $old_userpic = $account->getById($id)['userpic'];
        $this->deleteImage($old_userpic);

        $userpic = $this->uploadImage($_FILES['userpic'], $this->img_path);

        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'userpic' => $userpic
        ];

        $account->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }
}
