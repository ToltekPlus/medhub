<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccessModel;
use Core\View;

class AccessController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $accesses = new AccessModel();
        $result = $accesses->showAll();

        View::render('pages/accesses/index.php', ['accesses' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {
        View::render('pages/accesses/add.php');
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $args = [
            'name_access' => $_POST['name_access'],
            'level_access' => $_POST['level_access']
        ];

        $access = new AccessModel();
        $access->store($args);

        //View::render('crud_result/store_result.php', ['back_url' => '/']);
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_GET['id'];
        $access = new AccessModel();
        $result = $access->getById($id);

        View::render('pages/accesses/edit.php', ['access' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $id = $_POST['id'];

        $args = [
            'name_access' => $_POST['name_access'],
            'level_access' => $_POST['level_access']
        ];

        $account = new AccessModel();
        $account->update($id, $args);

        //View::render('crud_result/update_result.php', ['back_url' => '/']);
    }

    /**
     * @throws \Exception
     */
    public function warning()
    {
        $id = $_GET['id'];

        View::render('pages/accesses/warning.php', ['id' => $id]);
    }

    public function delete()
    {
        $id =  $_POST['id'];

        $access = new AccessModel();
        $access->delete($id);

        //View::render('crud_result/delete_result.php', ['back_url' => '/accesses']);
    }

    public function newSaccess($id)
    {
        $access = new AccessModel();

        $_SESSION['saccess'] = $access->getById($id)['level_access'];
    }
}