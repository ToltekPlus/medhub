<?php

namespace App\Model;

use App\Handler\Model;

class DirectionsCategoryModel extends Model {
    private $table = 'directions_category';

    /**
     * @return array
     */
    public function showAll()
    {
        $directions_categories = new DirectionsCategoryModel();

        $params = [
            'table' => 'categories',
            'foreign_key' => 'category_id'
        ];

        $sql = $directions_categories->sctuctureQuery($this->table, array($params),'id','table');  

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
        $params = [
            'table' => 'categories',
            'foreign_key' => 'category_id'
        ];

        $sql = $this->sctucturefindById($id, $this->table, array($params));  

        $result = $this->db->query($sql);

        return $result[0];
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