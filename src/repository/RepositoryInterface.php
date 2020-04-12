<?php

namespace Repository;

/**
 * Interface RepositoryInterface
 * @package Repository
 */
interface RepositoryInterface {

    /**
     * @param $id
     *
     * @return mixed
     */
    public static function getById($id);
}
