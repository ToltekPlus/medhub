<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DashboardModel;
use Core\ControllerInterface;
use Core\View;

class DashboardController extends Controller {
    public function show()
    {
        $dashboard = DashboardModel::showAll();
        View::render('pages\home\dashboard.php', ['dashboard' => $dashboard]);
    }

    public function reception()
    {
        $dashboard = DashboardModel::makeReception();
        View::render('pages\home\reception\reception.php', ['dashboard'=> $dashboard]);
    }
}
