<?php

namespace App\Handler;

use Core\Database;

abstract class Model {
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db =  new Database();
    }

    /**
     * Выводим только первый элемент
     *
     * @param $query
     * @return mixed
     */
    protected function first($query)
    {
        $sql = $query . " LIMIT 1";

        $result = $this->db->query($sql);

        return array_shift($result);
    }

    /**
     * защищенный метод для получения sql-кода и отправки его (и исполения) к БД
     * работаем без связуемых таблиц
     *
     * @param $table
     * @return array
     */
    protected function get($table)
    {
        $sql = "SELECT * FROM " . $table;

        $result = $this->db->query($sql);

        return $result;
    }

    /**
     * показать все данные из таблиц
     *
     * @param $table
     * @param $params
     * @param $group_key
     * @param $table_key
     * @return array
     */
    protected function all($table, $params, $group_key, $table_key)
    {
        $sql = $this->sctuctureQuery($table, $params, $group_key, $table_key);

        $result = $this->db->query($sql);

        return $result;
    }

    /**
     *   составляем sql-запрос из предложенных параметров
        разбираем массив $params на следующие пункты:
        - table => название связываемой таблицы
        - foreign_key => требуемая связываемое поле с таблицей модели
        Сравнивая с количеством таблиц выясняем последняя ли группировка
        Если последняя, то не добавляем AND в запрос
        $group_length - вычисляем ключ для группировки. Если пользователь ничего не ввел,
        то группируем по id таблицы модели
     *
     * @param $table
     * @param $params
     * @param $group_key
     * @param $table_key
     * @return string
     */
    public function sctuctureQuery($table, $params, $group_key, $table_key)
    {
        $where = '';
        $selected_tables = $table;
        $count = count($params);
        $group_length = strlen(str_replace(' ', '', $group_key));
        if ($group_length == 0) {
          $group_key = 'id';
        }

        if ($count > 0) {
          $where = ' WHERE ';
          foreach ($params as $key => $value) {
            $selected_tables = $selected_tables . ', ' . $value['table'];
            if ($key == $count-1) {
              $where .=  $table . '.' . $value['foreign_key'] . '=' . $value['table']. '.id ';
            }else {
              $where .=  $table . '.' . $value['foreign_key'] . '=' . $value['table']. '.id AND ';
            }
          }
          $where .= ' GROUP BY ' . $table. '.' . $group_key;
        }
        $sql = "SELECT *, " . $table . ".id AS " . $table_key . " FROM " . $selected_tables . $where;

        return $sql;
    }

    /**
     * Поиск по id
     *
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findById($table, $id)
    {
        $args = ['id' => $id];
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';

        $result = $this->db->execute($sql, $args);

        return $result;
    }

    /**
     * удаление по id
     *
     * @param $table
     * @param $id
     * @return bool
     */
    public function deleteFromTable($table, $id)
    {
        $args = ['id' => $id];
        $sql = 'DELETE FROM ' . $table . ' WHERE id = :id';

        $this->db->execute($sql, $args);

        return true;
    }

    /**
     * Обновляем данные для одной таблицы
     *
     * @param $table
     * @param $id
     * @param $args
     */
    public function updateForTable($table, $id, $args)
    {
        $sql = $this->structureQueryForUpdate($id, $table, $args);

        $this->db->execute($sql, $args);
    }

    /**
     * Составляем запрос для обновленя
     *
     * @param $id
     * @param $table
     * @param $fields
     * @return string
     */
    //TODO проверить правильность обновления
    public function structureQueryForUpdate($id, $table, $fields)
    {
        $set = ' SET ';
        $last_key = end(array_keys($fields));

        foreach ($fields as $key => $value) {
            if ($key == $last_key) {
                $set .= $key . ' = :' . $key;
            }else {
                $set .= $key . '= :' . $key . ', ';
            }
        }

        $sql = 'UPDATE ' . $table . $set . ' WHERE id=' . $id;

        return $sql;
    }

    /**
     * Добавляем данные в одну таблицу
     *
     * @param $table
     * @param $args
     */
    public function storeToTable($table, $args)
    {
        $sql = $this->structureQueryForStore($table, $args);

        $this->db->execute($sql, $args);
    }

    /**
     * Составляем запрос для добавления в одну таблицу
     *
     * @param $table
     * @param $fields
     * @return string
     */
    public function structureQueryForStore($table, $fields)
    {
        $set = '';
        $values = '';

        $last_key = end(array_keys($fields));

        foreach ($fields as $key => $value) {
            if ($key == $last_key) {
                $values .= ':' . $key;
                $set .= $key;
            }else {
                $values .= ':' . $key . ',';
                $set .= $key . ',';
            }
        }

        $sql = 'INSERT INTO ' . $table . " (" .$set . ") VALUES (" . $values . ")";

        return $sql;
    }
    public function allReception($table, $params, $group_key, $table_key){
        $sql = $this->structureQueryForReception($table, $params, $group_key, $table_key);

        $result = $this->db->query($sql);

        return $result;
    }

    public function structureQueryForReception($table, $params, $group_key, $table_key){
        $where = '';
        $selected_tables = $table;
        $count = count($params);
        $group_length = strlen(str_replace(' ', '', $group_key));
        if ($group_length == 0) {
            $group_key = 'id';
        }

        if ($count > 0) {
            $where = ' WHERE ';
            foreach ($params as $key => $value) {
                $selected_tables = $selected_tables . ', ' . $value['table'];
                if ($key == $count-1) {
                    $where .=  $table . '.' . $value['foreign_key'] . '=' . $value['table'] . '.id ';
                }else {
                    $where .=  $table . '.' . $value['foreign_key'] . '=' . $value['table'] . '.id AND ';
                }
            }
            $where .= ' AND ' . ' ' . ' GROUP BY ' . $table. '.' . $group_key;
        }
        $sql = "SELECT *, " . $table . ".id AS " . $table_key . " FROM " . $selected_tables . $where;

        //var_dump($sql);

        return $sql;
    }
}
