<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController {
    // TODO доделать номарльную авторизацию
    public function auth()
    {
        $user = UserModel::showAuth();

        echo "USER - " . $user->login . " с ID " . $user->id;
    }
}
