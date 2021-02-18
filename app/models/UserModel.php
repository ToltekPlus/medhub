<?php

namespace App\Model;

use App\Handler\Model;

class UserModel extends Model {
    private $table = "users";

    //TODO сделать нормальную авторизацию
    /**
     * @return mixed
     */
    static function showAuth()
    {
        $user = new UserModel();
        $query = $user->authQuery();

        $result = $user->first($query);

        return $result;
    }

    //TODO сделать нормальную авторизацию
    /**
     * @return string
     */
    public function authQuery()
    {
        $sql = "SELECT * FROM " . $this->table;

        return $sql;
    }

    public function deleteById($id)
    {
      return $this->deleteFromTable($this->table, $id);
    }
}
