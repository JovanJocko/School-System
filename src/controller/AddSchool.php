<?php
/**
 * Created by PhpStorm.
 * User: jovan
 * Date: 12.4.20.
 * Time: 16.38
 */

namespace Controller;

use Repository\SchoolRepository;


class AddSchool extends AbstractController
{

    /**
     * @param $param
     *
     * @return mixed
     */
    public function execute($param)
    {
        $data = [];
        $update = SchoolRepository::addSchool($data);
    }
}
