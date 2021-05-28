<?php

namespace App\Model;

use App\Handler\Model;

class DashboardModel extends Model{
    private $table = 'dashboards';

    private $table_for_reception = 'doctor_directions';

    /**
     * показываем аккаунты в Дашборде через ассоциативный массив
     * таблица - table
     * связываемый ключ таблицы модели - foreign_key
     * @return array
     */
    static function showAll() {
        $dashboard = new DashboardModel();

        $pivot_table = [
            [
                'table' => 'users',
                'foreign_key' => 'client_id'
            ],
            [
                'table' => 'doctor_directions',
                'foreign_key' => 'doctor_direction_id'
            ]
        ];

        return $dashboard->all($dashboard->query(), $pivot_table , '', 'dashboard_key');
    }

    /**
     * показываем докторов и их услуги в Дашборде через ассоциативный массив
     * таблица - table
     * связываемый ключ таблицы модели - foreign_key
     * @return array
     */
    static function makeReception()
    {
        $dashboard = new DashboardModel();
        $mass = [
            [
                'table' => 'directions_category',
                'foreign_key' => 'direction_id'
            ],
            [
                'table' => 'accounts',
                'foreign_key' => 'user_id'
            ]
        ];
        return $dashboard->allReception($dashboard->query_for_reception(), $mass , '', 'dashboard_key');
    }

    /**
     * возвращаем таблицу для статичного метода(showAll)
     * @return string
     */
    public function query()
    {
        return $this->table;
    }

    /**
     * возвращаем таблицу для статичного метода(makeReception)
     * @return string
     */
    public function query_for_reception(){
        return $this->table_for_reception;
    }

    /**
     * @param $args
     */
    public function store($args)
    {
        return $this->storeToTable($this->table, $args);
    }
}