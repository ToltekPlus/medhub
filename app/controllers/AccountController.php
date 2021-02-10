<?php

namespace App\Controller;

use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;

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

    public function update()
    {
        // TODO: Implement update() method.
    }
}
