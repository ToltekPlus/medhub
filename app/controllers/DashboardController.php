<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DashboardModel;
use Core\ControllerInterface;
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
        $dashboard = DashboardModel::makeReception();
        View::render('pages\home\reception\reception.php', ['dashboard'=> $dashboard]);
    }
}
