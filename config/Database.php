<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $dbname = "web";
    private $user = "root";
    private $password = "";
    public $connect;

    /**
     * Database constructor.
     */
    public function __construct()
        {
        try {
          $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";", $this->user, $this->password);
          $this->connect->exec("set names utf8");
        } catch (PDOException $e) {
          echo "Error connect to database: " . $e->getMessage();
        }
    }

    /**
     * переопределяем метод query()
     *
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $query = $this->connect->query($sql);
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     *  переопределяем метод execute()
     *  возвращаем ассоциативный массив
     *
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function execute($sql, $params = [])
    {
        $query = $this->connect->prepare($sql);
        $query->execute($params);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}