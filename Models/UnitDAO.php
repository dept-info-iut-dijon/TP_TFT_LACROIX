<?php

namespace Models;

use PDO;

class UnitDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = 'SELECT * FROM UNIT';
        $stmt = $this->execRequest($sql);
        $units = [];

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $unit = new Unit();
                $unit->setId($row['id']);
                $unit->setName($row['name']);
                $unit->setCost($row['cost']);
                $unit->setOrigin($row['origin']);
                $unit->setUrlImg($row['url_img']);
                $units[] = $unit;
            }
        }

        return $units;
    }

    public function getByID(string $id): ?Unit
    {
        $sql = 'SELECT * FROM UNIT WHERE id = ?';
        $stmt = $this->execRequest($sql, [$id]);

        if ($stmt && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $unit = new Unit();
            $unit->setId($row['id']);
            $unit->setName($row['name']);
            $unit->setCost($row['cost']);
            $unit->setOrigin($row['origin']);
            $unit->setUrlImg($row['url_img']);
            return $unit;
        }

        return null;
    }
}