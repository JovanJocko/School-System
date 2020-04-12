<?php

namespace Repository;

use Core\DBClass;
use Entity\School;
use PDO;

require '../etc/config.php';

/**
 * Class SchoolRepository
 * @package Repository
 */
class SchoolRepository implements RepositoryInterface
{
    /**
     * @param $id
     *
     * @return \Entity\School
     */
    public static function getById($id)
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT `school`.`id`, `school`.`name`,
                        `grading_type`.`type` as `grading_type`,
                        `output_type`.`type` as `output_type`,
                        `grading_type`.`description`
                        FROM `school`
                        LEFT JOIN `grading_type` ON `school`.`grading_type` = `grading_type`.`id`
                        LEFT JOIN `output_type` ON `school`.`output_type` = `output_type`.`id`
                        WHERE `school`.`id` = ?";
        $stmt = $db->getConnection()->prepare($queryString);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return new School($data);
    }

    public static function addSchool($data)
    {
        $db = DBClass::getInstance();
        $queryString = "INSERT INTO `school` (`name`, `output_type`, `grading_type`) VALUES (?,?,?) ";
        $stmt = $db->getConnection()->prepare($queryString);
        $stmt->execute([$data['school_name'], $data['output_type'], $data['grading_type']]);
    }
}
