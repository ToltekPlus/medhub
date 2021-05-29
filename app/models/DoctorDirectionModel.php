<?php

namespace App\Model;

use App\Handler\Model;

class DoctorDirectionModel extends Model {
    private $table = 'doctor_directions';

    /**
     * @return array
     */
    public function showAll()
    {
        $doctor_directionss = new DoctorDirectionModel();
        return $doctor_directionss->get($this->table);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $model = new DoctorDirectionModel();

        $params1 = [
            'table' => 'users',
            'foreign_key' => 'user_id'
        ];

        $params2 = [
            'table' => 'directions_category',
            'foreign_key' => 'direction_id'
        ];

        $params = array($params1, $params2);

        $sql = $model->sctuctureQuery($this->table, $params,'id',' '); 

        $result = $this->db->query($sql);

        return $result;     
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

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->deleteFromTable($this->table, $id);
    }
}