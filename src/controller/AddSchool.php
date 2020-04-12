<?php

namespace Controller;

use Repository\SchoolRepository;

/**
 * Class AddSchool
 * @package Controller
 */
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
        if (isset($_POST['school_name'])) {
            $data['school_name'] = $_POST['school_name'];
            $data['grading_type'] = $_POST['grading_type'];
            $data['output_type'] = $_POST['output_type'];
            SchoolRepository::addSchool($data);
            header("Location: /");
        }

    }
}
