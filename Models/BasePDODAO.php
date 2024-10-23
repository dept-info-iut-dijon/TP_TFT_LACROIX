<?php

namespace Models;

use Config\Config;
use PDO;
use PDOStatement;

abstract class BasePDODAO
{
    private PDO $db;

    protected function execRequest(string $sql, array $params = null) : PDOStatement|false
    {
        $this->db = $this->getDB();
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    private function getDB() : PDO
    {
        if ($this->db === null) {
            $dsn = Config::get('DB.dsn');
            $user = Config::get('DB.user');
            $pass = Config::get('DB.pass');
            $this->db = new PDO($dsn, $user, $pass);
        }
        return $this->db;
    }
}