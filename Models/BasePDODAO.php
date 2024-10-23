<?php

namespace Models;

use Config\Config;
use PDO;
use PDOStatement;

abstract class BasePDODAO
{
    private $db;

    protected function execRequest(string $sql, array $params = null) : PDOStatement|false
    {
        $this->db = $this->getDB();
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    private function getDB() : PDO
    {
        if ($this->db == null) {
            $dsn = Config::get('dsn');
            $user = Config::get('user');
            $pass = Config::get('pass');
            $this->db = new PDO($dsn, $user, $pass);
        }
        return $this->db;
    }
}