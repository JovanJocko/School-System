<?php

namespace Repository;

use Core\DBClass;
use PDO;

class OutputTypeRepository implements RepositoryInterface
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public static function getById($id)
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT * FROM `output_type` WHERE `id` = ?";
        $stmt = $db->getConnection()->prepare($queryString);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public static function getAll()
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT * FROM `output_type`";
        $stmt = $db->query($queryString);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}
