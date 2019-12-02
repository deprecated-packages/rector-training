<?php declare(strict_types=1);

namespace Rector\RectorTraining;

final class NetteCodeQuality
{
    /**
     * @noRector \Rector\DeadCode\Rector\Plus\RemoveZeroAndOneBinaryRector
     * @noRector \Rector\DeadCode\Rector\Plus\AnotherRector
     */
    public function go()
    {
        return file_get_contents('...');
    }

    public function run()
    {
        return json_decode('@{}');
    }
}
