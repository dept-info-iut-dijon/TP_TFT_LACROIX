<?php

namespace Models;

use PDO;

class OriginDAO extends BasePDODAO {
    public function getAll(): array {
        $sql = "SELECT * FROM ORIGIN";
        $stmt = $this->execRequest($sql);
        $origins = [];

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $origin = new Origin();
                $origin->setId($row['id']);
                $origin->setName($row['name']);
                $origin->setUrlImg($row['url_img']);
                $origins[] = $origin;
            }
        }

        return $origins;
    }

    public function getById(int $id): ?Origin {
        $sql = "SELECT * FROM ORIGIN WHERE id = ?";
        $stmt = $this->execRequest($sql, [$id]);

        if ($stmt && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $origin = new Origin();
            $origin->setId($row['id']);
            $origin->setName($row['name']);
            $origin->setUrlImg($row['url_img']);
            return $origin;
        }

        return null;
    }

    public function create(Origin $origin) {
        $sql = "INSERT INTO ORIGIN (name, url_img) VALUES (:name, :url_img)";
        $params = [
            ':name' => $origin->getName(),
            ':url_img' => $origin->getUrlImg()
        ];
        $this->execRequest($sql, $params);
    }

    public function delete(int $id): int {
        $sql = "DELETE FROM ORIGIN WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->execRequest($sql, $params);
        return $stmt->rowCount();
    }

    public function edit(Origin $origin): int {
        $sql = "UPDATE ORIGIN SET name = :name, url_img = :url_img WHERE id = :id";
        $params = [
            ':id' => $origin->getId(),
            ':name' => $origin->getName(),
            ':url_img' => $origin->getUrlImg()
        ];
        $stmt = $this->execRequest($sql, $params);
        return $stmt->rowCount();
    }
}