<?php

namespace App\Model;

use App\Handler\Model;

class AccessModel extends Model {
    private $table = 'accesses';

    /**
     * @return array
     */
    public function showAll()
    {
        $accesses = new AccessModel();
        return $accesses->get($this->table);
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