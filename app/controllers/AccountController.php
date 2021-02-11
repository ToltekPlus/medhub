<?php

namespace App\Controller;

use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;
use function Couchbase\defaultDecoder;

class AccountController implements ControllerInterface {
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
        $account->deleteById($id);

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
        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname']
        ];

        $account = new AccountModel();
        $account->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }
}
