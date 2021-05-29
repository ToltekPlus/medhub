<?php

namespace App\Model;

use App\Handler\Model;

class DashboardModel extends Model{
    private $table = 'dashboards';

    private $table_for_reception = 'doctor_directions';

    /**
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

        $dashboards = $dashboard->all($dashboard->query(), $pivot_table , '', 'dashboard_key');

        $account = new AccountModel();
        $direction = new DirectionsCategoryModel();
        $doctor_directions = new DoctorDirectionModel();

        $result = [];
        foreach ($dashboards as $key => $value) {
            if (date("Y-m-d H:i:s") > $value->time_of_visit) {
                $doctor_direction = $doctor_directions->getById($value->doctor_direction_id);
                $result[$key]['dashboard'] = $value;
                $result[$key]['client'] = $account->getById($value->client_id);
                $result[$key]['doctor_directions'] = $doctor_directions->getById($value->direction_id);
                $result[$key]['direction'] = $direction->getById($doctor_direction['direction_id']);
            }
        }

        return $result;
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

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->findById($this->table, $id);
    }

    /**
     * @param $id
     * @param $args
     */
    public function update($id, $args)
    {
        return $this->updateForTable($this->table, $id, $args);
    }
}