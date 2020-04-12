<?php

namespace Repository;

use Core\DBClass;
use Entity\Grade;
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
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $grades = [];

        foreach ($data as $grade) {
            $grades[] = new Grade($grade);
        }

        return $grades;
    }
}
