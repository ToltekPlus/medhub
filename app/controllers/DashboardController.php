<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccountModel;
use App\Model\DashboardModel;
use App\Model\DoctorDirectionModel;
use Core\View;

class DashboardController extends Controller {
    /**
     * Метод для вывода пользователей и информации для них в Дашборде
     * @throws \Exception
     */
    public function show()
    {
        $dashboard = DashboardModel::showAll();
        View::render('pages\home\dashboard.php', ['dashboard' => $dashboard]);
    }

    /**
     * Метод для вывода докторов и их услуг для состовления записи на приём
     * @throws \Exception
     */
    public function reception()
    {
        //$dashboard = DashboardModel::makeReception();
        $doctor_directions = new DoctorDirectionModel();
        $doctor_directions_list = $doctor_directions->getAll();

        $clients = AccountModel::showAll();
        $client_list = [];

        foreach ($clients as $key => $value) {
            if ($value->access_id == 1) {
                $client_list[] = $value;
            }
        }

        View::render('pages\home\reception\reception.php', ['doctors'=> $doctor_directions_list, 'clients' => $client_list]);
    }

    /**
     * Добавляем клиента на посещение
     */
    public function store()
    {
        if (isset($_POST['urgency'])) {
            $urgency = 1;
        }else {
            $urgency = 0;
        }

        $args = [
            'doctor_direction_id' => $_POST['doctor_direction_id'],
            'client_id' => $_POST['client_id'],
            'comment' => $_POST['comment'],
            //'urgency' => filter_var ($urgency, FILTER_VALIDATE_BOOLEAN)
            'urgency' => $urgency
        ];

        $dashboard = new DashboardModel();
        $dashboard->store($args);
    }
}
