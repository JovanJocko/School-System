<?php

namespace Repository;

use Core\DBClass;
use Entity\Student;
use PDO;

/**
 * Class StudentRepository
 * @package Repository
 */
class StudentRepository implements RepositoryInterface
{
    /**
     * @param $id
     *
     * @return \Entity\Student
     */
    public static function getById($id)
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT * FROM `student` WHERE `id` = ?";
        $stmt = $db->getConnection()->prepare($queryString);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Student($data);
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        $db = DBClass::getInstance();
        $queryString = "SELECT * FROM `student` ORDER BY `school_id`";
        $stmt = $db->query($queryString);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach ($data as $student) {
            $students[] = new Student($student);
        }

        return $students;
    }
}
