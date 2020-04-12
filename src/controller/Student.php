<?php

namespace Controller;

/**
 * Class Student
 * @package Controller
 */
class Student extends AbstractController
{

    /**
     * @param $param
     *
     * @return mixed
     */
    public function execute($param)
    {
        $array = $this->getById($param);
        if (isset($array) && $array->getName() != null) {
            $type = $array->getSchool()->getOutputType();
            $viewNameSpace = 'Views\\';
            $viewName = $viewNameSpace . $type . 'View';
            if (file_exists('../src/views/' . $type . 'View.php')) {
                $view = new $viewName($array->getData());
                return $view->render($type);
            } else {
                echo 'No such View file for selected output => ' . $type;
            }
        } else {
            echo 'No such student with id => ' . $param;
        }
    }
}
