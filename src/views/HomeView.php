<?php

namespace Views;

class HomeView extends AbstractView
{

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function prepareViewData()
    {
        $viewData = [];
        foreach ($this->data as $student) {
            $school = $student->getSchool();
            $viewData[$school->getName()][] = [
                'id' => $student->getId(),
                'name' => $student->getName(),
                'outputType' => $school->getOutputType(),
                'gradingType' => $school->getGradingType(),
                'description' => $school->getDescription()
            ];
        }

        $this->viewData = $viewData;
    }
}
