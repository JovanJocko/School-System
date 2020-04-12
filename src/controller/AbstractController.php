<?php

namespace Controller;

use Repository\StudentRepository;

/**
 * Class AbstractController
 * @package Controller
 */
abstract class AbstractController
{
    /**
     * @var object $studentRepository \Repository\StudentRepository
     */
    private $studentRepository;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->studentRepository = new StudentRepository();
    }

    /**
     * @param $param
     *
     * @return mixed
     */
    abstract public function execute($param);

    /**
     * Get all students
     *
     * @return array
     */
    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }

    /**
     * Get Student by id
     *
     * @param $id
     *
     * @return \Entity\Student
     */
    public function getById($id)
    {
        return $this->studentRepository->getById((int)$id);
    }

    /**
     * @return object
     */
    public function getStudentRepository(): object
    {
        return $this->studentRepository;
    }

    /**
     * @param object $studentRepository
     */
    public function setStudentRepository(object $studentRepository): void
    {
        $this->studentRepository = $studentRepository;
    }

}
