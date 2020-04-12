<?php

namespace Views;

/**
 * Class AbstractView
 * @package Views
 */
abstract class AbstractView
{
    /**
     * @var array $data Array with students
     */
    protected $data;
    /**
     * @var string $viewData Array with output data of student
     */
    protected $viewData;
    /**
     * @var string $templateFile Template file path
     */
    protected $templateFile;

    /**
     * AbstractView constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->viewData = '';
        $this->templateFile = '';
    }

    /**
     * @param $type - Type and template file name
     */
    public function render($type) {
        $type = strtolower($type);
        $this->prepareViewData();
        $this->templateFile = '../src/templates/' . $type . 'template.phtml';
        if (file_exists($this->templateFile)) {
            if ($type != 'home') {
                header('content-type: text/' . $type);
            }
            include $this->templateFile;
        } else {
            echo 'No such template file => ' . $this->templateFile;
        }
    }

    /**
     * Prepare output data for View
     *
     * @return mixed
     */
    abstract public function prepareViewData();

}
