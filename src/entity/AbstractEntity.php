<?php

namespace Entity;

/**
 * Class AbstractEntity
 * @package Entity
 */
abstract class AbstractEntity
{

    /**
     * @var int $id Database table id field
     */
    protected $id;

    /**
     * AbstractEntity constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->setId((int)$data['id']);
    }

    /**
     * @return mixed
     */
    public abstract function getData();

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
