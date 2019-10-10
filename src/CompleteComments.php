<?php declare(strict_types=1);

namespace Rector\RectorTraining;

final class CompleteComments
{
    public function run()
    {
        $ret = 'foo';

        // some other code

        return $ret;
    }

    public function run2()
    {
        $arr = [];

        // some other code

        return $arr;
    }
}
