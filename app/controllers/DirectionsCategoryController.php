<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DirectionsCategoryModel;
use Core\View;

class DirectionsCategoryController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $model = new DirectionsCategoryModel();
        $result = $model->showAll();

        View::render('pages/directions_category/index.php', ['directions_category' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {
        View::render('pages/directions_category/add.php');
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

//     /**
//      * @throws \Exception
//      */
//     public function edit()
//     {
//         $id = $_GET['id'];
//         $access = new AccessModel();
//         $result = $access->getById($id);

//         View::render('pages/accesses/edit.php', ['access' => $result]);
//     }

//     *
//      * @throws \Exception
     
//     public function update()
//     {
//         $id = $_POST['id'];

//         $args = [
//             'name_access' => $_POST['name_access'],
//             'level_access' => $_POST['level_access']
//         ];

//         $account = new AccessModel();
//         $account->update($id, $args);

//         //View::render('crud_result/update_result.php', ['back_url' => '/']);
//     }

//     /**
//      * @throws \Exception
//      */
//     public function warning()
//     {
//         $id = $_GET['id'];

//         View::render('pages/accesses/warning.php', ['id' => $id]);
//     }

//     public function delete()
//     {
//         $id =  $_POST['id'];

//         $access = new AccessModel();
//         $access->delete($id);

//         //View::render('crud_result/delete_result.php', ['back_url' => '/accesses']);
//     }
}