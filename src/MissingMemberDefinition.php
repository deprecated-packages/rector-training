<?php declare(strict_types=1);

namespace Rector\RectorTraining;

final class MissingMemberDefinition
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->validate($name);
        // $this->validateName($name);
        $this->name = $name;
    }
}
