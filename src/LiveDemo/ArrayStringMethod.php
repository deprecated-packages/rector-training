<?php declare(strict_types=1);

namespace Rector\RectorTraining\LiveDemo;

final class ArrayStringMethod
{
    public function run()
    {
        array_map([$this, 'anotherOldMethod'], []);
        array_map([$this, 'oldMethod'], []);
        array_map([$this, 'keepMethod'], []);
        new Return_();
    }
}
