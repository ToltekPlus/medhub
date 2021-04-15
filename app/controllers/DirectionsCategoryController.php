<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DirectionsCategoryModel;
use App\Model\CategoryModel;
use Core\View;

class DirectionsCategoryController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $direction_category_model = new DirectionsCategoryModel();
        $category_model = new CategoryModel();

        $result_directions_category = $direction_category_model->showAll();
        $result_category = $category_model->get_all();
        $category = [];

        foreach($result_category as $value){
            $category[$value->id] = $value->name_category;
        }

        View::render('pages/directions_category/index.php', ['directions_category' => $result_directions_category, 'category' => $category]);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {

        $category_model = new CategoryModel();

        $result_category = $category_model->get_all();
        $category = [];

        foreach($result_category as $value){
            $category[$value->id] = $value->name_category;
        }

        View::render('pages/directions_category/add.php', ['category' => $category]);
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $args = [
            'category_id' => $_POST['category_id'],
            'name_direction' => $_POST['name_direction'],
            'price' => $_POST['price'],
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ];

        $model = new DirectionsCategoryModel();
        $model->store($args);

        //View::render('crud_result/store_result.php', ['back_url' => '/']);
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $id = $_GET['id'];

        $model = new DirectionsCategoryModel();
        $result = $model->getById($id);


        $category_model = new CategoryModel();

        $result_category = $category_model->get_all();
        $category = [];

        foreach($result_category as $value){
            $category[$value->id] = $value->name_category;
        }

        View::render('pages/directions_category/edit.php', ['directions_category' => $result, 'category' => $category]);
    }

    // *
    //  * @throws \Exception
     
    public function update()
    {
        $id = $_POST['id'];

        $args = [
            'category_id' => $_POST['category_id'],
            'name_direction' => $_POST['name_direction'],
            'price' => $_POST['price'],
            'updated_at' => date('Y-m-d H:i:s', time())
        ];

        $model = new DirectionsCategoryModel();
        $model->update($id, $args);

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

        $model = new DirectionsCategoryModel();
        $model->delete($id);

        //View::render('crud_result/delete_result.php', ['back_url' => '/accesses']);
    }
}