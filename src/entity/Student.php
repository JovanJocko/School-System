<?php

namespace Entity;

use Repository\GradesRepository;
use Repository\SchoolRepository;

/**
 * Class Student
 * @package Entity
 */
class Student extends AbstractEntity
{

    /**
     * @var string $name Student's name
     */
    protected $name;
    /**
     * @var int $schoolId School id
     */
    protected $schoolId;
    /**
     * @var null|object $school School data
     */
    protected $school = null;
    /**
     * @var null|array $grades Student grades
     */
    protected $grades = null;
    /**
     * @var string $finalResult Final result (Pass|Fail)
     */
    protected $finalResult;
    /**
     * @var float $avgGrade Average grade for student
     */
    protected $avgGrade;

    /**
     * Student constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);

        $this->setName($data['name']);
        $this->setSchoolId((int)$data['school_id']);
        $this->init();
        $this->calculate();
    }

    /**
     * Create array with student data
     *
     * @return mixed
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'school' => $this->getSchool()->getData(),
            'grades' => $this->getGrades(),
            'avgGrade' => $this->getAvgGrade(),
            'finalResult' => $this->getFinalResult()
        ];
    }

    /**
     * Initialize School and Grades
     */
    public function init()
    {
        if ($this->school === NULL) {
            $this->setSchool(SchoolRepository::getById($this->schoolId));
        }

        if ($this->grades === NULL) {
            $grades = GradesRepository::getById($this->id);
            $array = [];
            foreach ($grades as $grade) {
                $array[] = $grade->getValue();
            }
            $this->setGrades($array);
        }
    }

    /**
     * Calculate average grade and final result
     */
    public function calculate()
    {
        $grades = $this->getGrades();
        $count = count($grades);
        $avg = 0;
        $finalResult = "Fail";

        if ($count) {
            $sum = 0;
            $maxGrade = $grades[0];
            for ($i = 0; $i < $count; $i++) {
                $value = $grades[$i];
                $sum += $value;
                $maxGrade = $value > $maxGrade ? $value : $maxGrade;
            }
            $avg = $sum/$count;
        }

        $grading = $this->getSchool()->getGradingType();
        if ($grading == School::GRADING_SYSTEM_CSM) {
            if ($count > 2) {
                $finalResult = $maxGrade > 8 ? "Pass" : "Fail";
            }
        } else {
            $finalResult = $avg >= 7.0 ? "Pass" : "Fail";
        }

        $this->setAvgGrade(number_format($avg, 2));
        $this->setFinalResult($finalResult);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->schoolId;
    }

    /**
     * @param int $schoolId
     */
    public function setSchoolId(int $schoolId): void
    {
        $this->schoolId = $schoolId;
    }

    /**
     * @return object|null
     */
    public function getSchool(): ?object
    {
        return $this->school;
    }

    /**
     * @param object|null $school
     */
    public function setSchool(?object $school): void
    {
        $this->school = $school;
    }

    /**
     * @return array|null
     */
    public function getGrades(): ?array
    {
        return $this->grades;
    }

    /**
     * @param array|null $grades
     */
    public function setGrades(?array $grades): void
    {
        $this->grades = $grades;
    }

    /**
     * @return string
     */
    public function getFinalResult(): string
    {
        return $this->finalResult;
    }

    /**
     * @param string $finalResult
     */
    public function setFinalResult(string $finalResult): void
    {
        $this->finalResult = $finalResult;
    }

    /**
     * @return float
     */
    public function getAvgGrade(): float
    {
        return $this->avgGrade;
    }

    /**
     * @param float $avgGrade
     */
    public function setAvgGrade(float $avgGrade): void
    {
        $this->avgGrade = $avgGrade;
    }
}
