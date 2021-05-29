<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DoctorDirectionModel;
use Core\View;
use App\Model\UserModel;
use App\Model\DirectionsCategoryModel;

class DoctorDirectionController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $doctor_directions = new DoctorDirectionModel();
        $result = $doctor_directions->getAll();
        View::render('pages/doctor_directions/index.php', ['doctor_directions' => $result]);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {
        $doctor_directions_model= new DirectionsCategoryModel();
        $result = $doctor_directions_model->showAll();

        $doctor_directions = [];

        foreach($result as $value){
             $doctor_directions[$value->id] = $value->name_direction;
        }

        $user_model= new UserModel();
        $result_user = $user_model->showAll();

        $user = [];
        foreach($result_user as $value){
             $user[$value->id] = $value->login;
        }

        View::render('pages/doctor_directions/add.php', ['doctor_directions' => $doctor_directions, 'user' => $user]);
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $args = [
            'user_id' => $_POST['user_id'],
            'direction_id' => $_POST['direction_id'],
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ];

        $doctor_direction = new DoctorDirectionModel();
        $doctor_direction->store($args);
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        $user_model = new UserModel();
 
        $result_user = $user_model->showAll();

        $user = [];

        foreach($result_user as $value){
            $user[$value->id] = $value->login;
        }

        $direction_model = new DirectionsCategoryModel();

        $result_direction = $direction_model->showAll();
        $direction = [];

        foreach($result_direction as $value){
            $direction[$value->id] = $value->name_direction;
        }

        $id = $_GET['id'];

        $doctor_direction = new DoctorDirectionModel();

        $result = $doctor_direction->getById($id);

        View::render('pages/doctor_directions/edit.php', ['doctor_directions' => $result, 'user' => $user, 'direction' => $direction]);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $id = $_POST['id'];

        $args = [
            'user_id' => $_POST['user_id'],
            'direction_id' => $_POST['direction_id'],
            'updated_at' => date('Y-m-d H:i:s', time())
        ];

        $account = new DoctorDirectionModel();
        $account->update($id, $args);
    }

    /**
     * @throws \Exception
     */
    public function warning()
    {
        $id = $_GET['id'];

        View::render('pages/doctor_directions/warning.php', ['id' => $id]);
    }

    /**
     * удаление
     */
    public function delete()
    {
        $id =  $_POST['id'];

        $doctor_direction = new DoctorDirectionModel();
        $doctor_direction->delete($id);
    }
}