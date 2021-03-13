<?php

namespace App\Model;

use App\Handler\Model;

class AccountModel extends Model {
    private $table = 'accounts';

    /**
     *   показываем аккаунты
     *   второй параметр при вызове all - связуемые параметры при составлении запроса
     *   ключ table - связываемая таблицы
     *   ключ foreign_key - связываемый ключ таблицы модели
     *
     * @return array
     */
    static function showAll()
    {
        $account = new AccountModel();

        $pivot_table = [
          [
            'table' => 'users',
            'foreign_key' => 'user_id'
          ],
          [
            'table' => 'accesses',
            'foreign_key' => 'access_id'
          ],
        ];

        return $account->all($account->query(), $pivot_table, '', 'account_key');
    }

    /**
     * поиск по id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->findById($this->table, $id);
    }

    /**
     * удаление по id
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->deleteFromTable($this->table, $id);
    }

    /**
     * @param $id
     * @param $args
     */
    public function update($id, $args)
    {
        return $this->updateForTable($this->table, $id, $args);
    }

    /**
     * возвращаем таблицу для статичного метода
     *
     * @return string
     */
    public function query()
    {
        return $this->table;
    }
}
