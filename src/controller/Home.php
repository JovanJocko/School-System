<?php

namespace Controller;

use Views\HomeView;

class Home extends AbstractController
{
    /**
     * @param $param
     *
     * @return mixed
     */
    public function execute($param)
    {
        $allStudents = $this->getAllStudents();
        $view = new HomeView($allStudents);

        $view->render('home');
    }
}
