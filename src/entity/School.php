<?php

namespace Entity;

/**
 * Class School
 * @package Entity
 */
class School extends AbstractEntity
{

    /**
     * @var string GRADING_SYSTEM_CSM School board with CSM grading system
     */
    const GRADING_SYSTEM_CSM = 'CSM';
    /**
     * @var string GRADING_SYSTEM_CSMB School board with CSMB grading system
     */
    const GRADING_SYSTEM_CSMB = 'CSMB';
    /**
     * @var string $name School name
     */
    protected $name;
    /**
     * @var string $outputType Output type
     */
    protected $outputType;
    /**
     * @var string $gradingType Grading type
     */
    protected $gradingType;
    /**
     * @var string $description Grading type description
     */
    protected $description;

    /**
     * School constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);

        $this->setName($data['name']);
        $this->setOutputType($data['output_type']);
        $this->setGradingType($data['grading_type']);
        $this->setDescription($data['description']);
    }

    /**
     * Create array with School data
     *
     * @return mixed
     */
    public function getData()
    {
        return [
            'name' => $this->getName(),
            'outputType' => $this->getOutputType(),
            'gradingType' => $this->getGradingType(),
            'description' => $this->getDescription(),
        ];
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
     * @return string
     */
    public function getOutputType(): string
    {
        return $this->outputType;
    }

    /**
     * @param string $outputType
     */
    public function setOutputType(string $outputType): void
    {
        $this->outputType = $outputType;
    }

    /**
     * @return string
     */
    public function getGradingType(): string
    {
        return $this->gradingType;
    }

    /**
     * @param string $gradingType
     */
    public function setGradingType(string $gradingType): void
    {
        $this->gradingType = $gradingType;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
