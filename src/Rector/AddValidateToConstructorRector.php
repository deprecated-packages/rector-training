<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class AddValidateToConstructorRector extends AbstractRector
{
    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @param ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isName($node, '__construct')) {
            return null;
        }

        foreach ($node->params as $param) {
            // $this->validate
            $thisVariable = new Node\Expr\Variable('this');
            $validateMethodCall = new Node\Expr\MethodCall($thisVariable, 'validate', [
                $param->var
            ]);

            if ($this->doesNodeExist($node, $validateMethodCall)) {
                continue;
            }

            $expression = new Expression($validateMethodCall);

            // in PHP 7.4
            // $node->stmts = [$validateMethodCall, ...$node->stmts];

            // in PHP 7.3-
            array_unshift($node->stmts, $expression);
        }

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }

    private function doesNodeExist(Node $node, Expr $needle): bool
    {
        return (bool) $this->betterNodeFinder->findFirst(
            $node->stmts,
            function (Node $node) use ($needle) {
                return $this->areNodesEqual($node, $needle);
            }
        );
    }
}
