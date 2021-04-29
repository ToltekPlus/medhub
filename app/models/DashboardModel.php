<?php

namespace App\Model;

use App\Handler\Model;

class DashboardModel extends Model{
    private $table = 'dashboards';


    static function showAll() {
        $dashboard = new DashboardModel();

        $pivot_table = [
            [
                'table' => 'accounts',
                'foreign_key' => 'user_id'
            ],
            [
                'table' => 'directions_category',
                'foreign_key' => 'doctor_direction_id'
            ]
        ];

        return $dashboard->all($dashboard->query(), $pivot_table , '', 'dashboard_key');
    }

    static function makeReception()
    {
        $dashboard = new DashboardModel();
        $mass = [
            [
                'table' => 'accounts',
                'foreign_key' => 'user_id'
            ],
            [
                'table' => 'directions_category',
                'foreign_key' => 'doctor_direction_id'
            ]
        ];
        return $dashboard->all($dashboard->query(), $mass , '', 'dashboard_key');
    }



    public function query()
    {
        return $this->table;
    }
}