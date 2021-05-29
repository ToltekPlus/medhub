<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccountModel;
use App\Model\DashboardModel;
use App\Model\DirectionsCategoryModel;
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
            'time_of_visit' => $_POST['time_of_visit'],
            //'urgency' => filter_var ($urgency, FILTER_VALIDATE_BOOLEAN)
            'urgency' => $urgency
        ];

        $dashboard = new DashboardModel();
        $dashboard->store($args);
    }

    /**
     * ferferferferferferferferferferferferferferferferferferferferferfer
     */
    public function receiptoutput() {
        $dashboard = new DashboardModel();
        $result = [];
        $account = new AccountModel();
        $direction = new DirectionsCategoryModel();
        $doctor_directions = new DoctorDirectionModel();
        $output = $dashboard->getById($_GET['id']);

        $doctor_direction = $doctor_directions->getById($output['doctor_direction_id']);
        $result['client'] = $account->getById($output['client_id']);
        $result['doctor_directions'] = $doctor_directions->getById($output['direction_id']);
        $result['direction'] = $direction->getById($doctor_direction['direction_id']);
        $result['dashboard'] = $output;
        View::render('pages\home\receipt.php', ['dashboard' => $result]);
    }

    /**
     * Клиент посетил доктора
     */
    public function checked()
    {
        $args = [
            'checked' => 1
        ];

        $application = new DashboardModel();
        $application->update($_GET['id'], $args);

        header('Location: /');
    }
}
