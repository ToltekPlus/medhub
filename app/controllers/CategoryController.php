<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\CategoryModel;
use Core\View;

class CategoryController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $categories = new CategoryModel();
        $result = $categories->showAll();

        View::render('pages/categories/index.php', ['categories' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {
        View::render('pages/categories/add.php');
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $args = [
            'name_category' => $_POST['name_category'],
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ];


        $category = new CategoryModel();
        $category->store($args);
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_GET['id'];
        $category = new CategoryModel();
        $result = $category->getById($id);

        View::render('pages/categories/edit.php', ['category' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $id = $_POST['id'];

        $args = [
            'name_category' => $_POST['name_category']
        ];

        $account = new CategoryModel();
        $account->update($id, $args);
    }

    /**
     * @throws \Exception
     */
    public function warning()
    {
        $id = $_GET['id'];

        View::render('pages/categories/warning.php', ['id' => $id]);
    }

    /**
     * Удаление категории
     */
    public function delete()
    {
        $id =  $_POST['id'];

        $category = new CategoryModel();
        $category->delete($id);
    }
}