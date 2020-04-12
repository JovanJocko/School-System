<?php

namespace Views;

/**
 * Class JsonView
 * @package Views
 */
class JsonView extends AbstractView
{
    /**
     * @inheritdoc
     */
    public function prepareViewData()
    {
        unset($this->data['school']);
        $this->viewData = json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
