<?php

namespace Views;

use Spatie\ArrayToXml\ArrayToXml;

/**
 * Class XMLView
 * @package Views
 */
class XMLView extends AbstractView
{
    /**
     * @inheritdoc
     */
    public function prepareViewData()
    {
        unset($this->data['school']);
        $this->viewData = ArrayToXml::convert($this->data, 'quantox');
    }
}
