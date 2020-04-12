<?php

namespace Views;

use Repository\GradingTypeRepository;
use Repository\OutputTypeRepository;

class HomeView extends AbstractView
{

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function prepareViewData()
    {
        $gradingTypes = GradingTypeRepository::getAll();
        $outputTypes = OutputTypeRepository::getAll();
        $viewData = [];
        foreach ($this->data as $student) {
            $school = $student->getSchool();
            $viewData['schools'][$school->getName()][] = [
                'id' => $student->getId(),
                'name' => $student->getName(),
                'outputType' => $school->getOutputType(),
                'gradingType' => $school->getGradingType(),
                'description' => $school->getDescription()
            ];
        }
        $viewData['gradigTypes'] = $gradingTypes;
        $viewData['outputTypes'] = $outputTypes;
        $this->viewData = $viewData;
    }
}
