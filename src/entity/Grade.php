<?php

namespace Entity;

/**
 * Class Grade
 * @package Entity
 */
class Grade extends AbstractEntity
{

    /**
     * @var int $studentId Student id
     */
    protected $studentId;
    /**
     * @var int $value Student's grade
     */
    protected $value;

    /**
     * Grade constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->setStudentId((int)$data['student_id']);
        $this->setValue((int)$data['value']);
    }

    /**
     * Create array with grades
     *
     * @return array|mixed
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'value' => $this->getValue()
        ];
    }

    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->studentId;
    }

    /**
     * @param int $studentId
     */
    public function setStudentId(int $studentId): void
    {
        $this->studentId = $studentId;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }


}
