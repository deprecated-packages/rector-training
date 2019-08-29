<?php declare(strict_types=1);

namespace App\Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

final class RenameMethodRector extends AbstractRector
{
    /**
     * @var string[]
     */
    private $oldMethodToNewMethod = [];

    /**
     * @param string[] $oldMethodToNewMethod
     */
    public function __construct(array $oldMethodToNewMethod)
    {
        $this->oldMethodToNewMethod = $oldMethodToNewMethod;
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [FuncCall::class];
    }

    /**
     * @param FuncCall $node
     */
    public function refactor(Node $node): ?Node
    {
        $this->renameMethod($node, $this->oldMethodToNewMethod);

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition(
            'Change method name even in [$this, "value"]', [
            new CodeSample(
                '[$this, "oldMethod"]',
                '[$this, "newMethod"]'
            )
        ]);
    }

    private function renameMethod(FuncCall $node, array $oldToNewMethod)
    {
        if (! $this->isName($node, 'array_map')) {
            return;
        }

        if (!isset($node->args[1])) {
            return;
        }

        $firstArgument = $node->args[0]->value;
        if (! $firstArgument instanceof Node\Expr\Array_) {
            return;
        }

        if (count($firstArgument->items) !== 2) {
            return;
        }

        // check "$this"
        $firstArrayItem = $firstArgument->items[0]->value;
        if (! $firstArrayItem instanceof Node\Expr\Variable) {
            return;
        }
        if (! $this->isName($firstArrayItem, 'this')) {
            return;
        }

        $secondArrayItem = $firstArgument->items[1]->value;
        if (! $secondArrayItem instanceof Node\Scalar\String_) {
            return;
        }

        $currentMethodName = $this->getValue($secondArrayItem);
        if (! isset($oldToNewMethod[$currentMethodName])) {
            return;
        }

        // change the name
        $secondArrayItem->value = $oldToNewMethod[$currentMethodName];
    }
}
