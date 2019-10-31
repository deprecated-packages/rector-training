<?php declare(strict_types=1);

namespace Rector\RectorTraining\TrainingExamples;

final class CamelCaseSnake
{
    private $some_name;

    public function go()
    {
        $http_response_header = 5;

        return $this->some_name;
    }
}
