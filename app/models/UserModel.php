<?php

namespace App\Model;

use App\Handler\Model;

class UserModel extends Model {
    private $table = "users";

    //TODO сделать нормальную авторизацию
    /**
     * @return mixed
     */
    static function showAuth($email)
    {
        $user = new UserModel();
        $query = $user->authQuery($email);

        $result = $user->first($query);

        return $result;
    }

    //TODO сделать нормальную авторизацию
    /**
     * @return string
     */
    public function authQuery($email)
    {
        $sql = "SELECT id, password FROM " . $this->table . " WHERE login=" . $email;

        return $sql;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteById($id)
    {
      return $this->deleteFromTable($this->table, $id);
    }
}
