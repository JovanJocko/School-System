<?php

namespace Repository;

use Core\DBClass;
use PDO;

/**
 * Class GradesRepository
 * @package Repository
 */
class GradesRepository implements RepositoryInterface
{
    /**
     * @param $id
     *
     * @return array
     */
    public static function getById($id)
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT * FROM `grades` WHERE `student_id` = ?";
        $stmt = $db->getConnection()->prepare($queryString);
        $stmt->execute([$id]);
        $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $grades;
    }
}
