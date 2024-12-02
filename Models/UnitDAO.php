<?php

namespace Models;

use PDO;

class UnitDAO extends BasePDODAO
{
    public function createUnit(Unit $unit) {
        $sql = "INSERT INTO UNIT (id, name, cost, origin, url_img) VALUES (:id, :name, :cost, :origin, :url_img)";
        $params = [
            ':id' => $unit->getId(),
            ':name' => $unit->getName(),
            ':cost' => $unit->getCost(),
            ':origin' => $unit->getOrigin(),
            ':url_img' => $unit->getUrlImg()
        ];
        $this->execRequest($sql, $params);
    }

    public function deleteUnit(string $idUnit = "-1") {
        if ($idUnit === "-1") {
            throw new \InvalidArgumentException("Invalid unit ID");
        }
        $sql = 'DELETE FROM UNIT WHERE id = :id';
        $params = ['id' => $idUnit];
        $this->execRequest($sql, $params);
    }

    public function updateUnit(Unit $unit) {
        $sql = "UPDATE UNIT SET name = :name, cost = :cost, origin = :origin, url_img = :url_img WHERE id = :id";
        $params = [
            ':id' => $unit->getId(),
            ':name' => $unit->getName(),
            ':cost' => $unit->getCost(),
            ':origin' => $unit->getOrigin(),
            ':url_img' => $unit->getUrlImg()
        ];
        $this->execRequest($sql, $params);
    }

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