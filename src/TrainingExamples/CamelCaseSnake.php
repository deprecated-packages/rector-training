<?php declare(strict_types=1);

namespace Rector\RectorTraining\TrainingExamples;

final class CamelCaseSnake
{
<<<<<<< HEAD
    public $some_name;
    // after
    public $someName;

    public function go(int $asdf)
    {
        // int
        $this->some_name = $asdf;
        $this->someOtherService->changeSomeNameToFloat();

=======
    private $some_name;

    public function go()
    {
>>>>>>> camelize rector
        $http_response_header = 5;

        return $this->some_name;
    }
<<<<<<< HEAD

    // after
    public function changeSomeNameToFloat()
    {
        $this->someName = 5.05;
    }
}

class User
{
    public function run()
    {
        $camelCaseSnake = new CamelCaseSnake();

        return $camelCaseSnake->some_name;
        // after
        // return $camelCaseSnake->getSomeName();
    }
=======
>>>>>>> camelize rector
}
