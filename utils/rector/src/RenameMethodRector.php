<?php declare(strict_types=1);

namespace App\Utils\Rector;

use PhpParser\Node;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class RenameMethodRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Expr\FuncCall::class];
    }

    /**
     * @param Node\Expr\FuncCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isName($node, 'array_map')) {
            return null;
        }

        if (!isset($node->args[1])) {
            return null;
        }

        $firstArgument = $node->args[0]->value;
        if (! $firstArgument instanceof Node\Expr\Array_) {
            return null;
        }

        if (count($firstArgument->items) !== 2) {
            return null;
        }

        // check "$this"
        $firstArrayItem = $firstArgument->items[0]->value;
        if (! $firstArrayItem instanceof Node\Expr\Variable) {
            return null;
        }
        if (! $this->isName($firstArrayItem, 'this')) {
            return null;
        }

        $secondArrayItem = $firstArgument->items[1]->value;
        if (! $secondArrayItem instanceof Node\Scalar\String_) {
            return null;
        }

        if (! $this->isValue($secondArrayItem, 'oldMethod')) {
            return null;
        }

        // change the name
        $secondArrayItem->value = 'newMethod';

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
