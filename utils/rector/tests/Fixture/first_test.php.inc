<?php

namespace App\Utils\Rector\Tests\Fixture;

class SomeClass
{
    public function run(array $items)
    {
        array_map([$this, "oldMethod"], $items);
    }
}

?>
-----
<?php

namespace App\Utils\Rector\Tests\Fixture;

class SomeClass
{
    public function run(array $items)
    {
        array_map([$this, "newMethod"], $items);
    }
}

?>
