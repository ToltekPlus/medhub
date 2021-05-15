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
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_GET['id'];
        $access = new AccessModel();
        $result = $access->getById($id);

        $accesses = $access->showAll();

        View::render('pages/accesses/edit.php', ['access' => $result, 'accesses' => $accesses]);
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

        $access = new AccessModel();
        $access->update($id, $args);
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
    }

    /**
     * Создание сессии для access_level
     *
     * @param $id
     */
    public function newSaccess($id)
    {
        $access = new AccessModel();

        $_SESSION['saccess'] = $access->getById($id)['level_access'];
    }
}