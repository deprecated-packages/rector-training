<?php declare(strict_types=1);

namespace App\Utils\Rector\Tests;

use App\Utils\Rector\RenameMethodRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class RenameMethodRectorTest extends AbstractRectorTestCase
{
    public function test()
    {
        $this->doTestFile(__DIR__ . '/Fixture/first_test.php.inc');
    }

    protected function getRectorsWithConfiguration(): array
    {
        return [
            RenameMethodRector::class => [
                '$oldMethodToNewMethod' => [
                    'oldMethod' => 'newMethod',
                ],
            ],
        ];
    }
}
