<?php

namespace App\Model;

use App\Handler\Model;

class CategoryModel extends Model {
    private $table = 'categories';

    /**
     * @return array
     */
    public function showAll()
    {
        $categories = new CategoryModel();
        return $categories->get($this->table);
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


    public function get_all(){
        return $this->get($this->table);   
    }
}