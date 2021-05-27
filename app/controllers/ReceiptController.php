<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\DashboardModel;
use Core\ControllerInterface;
use Core\View;

class ReceiptController extends Controller {
    public function showReceipt()
    {
        $dashboard = DashboardModel::showAll();
        View::render('pages/home/receipt.php', ['dashboard'=>$dashboard]);
    }
}
