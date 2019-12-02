<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Name;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class RenameStrlenFunctionRector extends AbstractRector
{
    public function getNodeTypes(): array
    {
        return [FuncCall::class];
    }

    /**
     * @param FuncCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if ($node->name->toString() !== 'strlen') {
            return null;
        }

        $node->name = new Name('mb_string');

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
