<?php

namespace App\Controller;

use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;

class AccountController implements ControllerInterface {
    /**
     * Вывод аккаунтов
     */
    public function show()
    {
        $accounts = AccountModel::showAll();

        foreach ($accounts as $key => $value) {
          echo 'Email: ' . $value->email . '<br>' .
          'Имя/Фамилия: ' . $value->name . ' ' . $value->surname . '<br>' .
          'Уровень доступа: ' . $value->name_access . ' с уровнем ' . $value->level_access . '<br>' .
          'Пользовательский ID:
              <a href=account?id=' . $value->account_key .'>' . $value->account_key . '</a><br>
              <a href=account/delete?id=' . $value->account_key .'>Удалить аккаунт</a>              
              <br><hr/><br>';
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

        View::render('show_account.php', ['account' => $result]);
    }

    public function deleteById()
    {
        $id =  $_GET['id'];
        $account = new AccountModel();
        $account->deleteById($id);

        View::render('delete_result.php', ['back_url' => '/']);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
