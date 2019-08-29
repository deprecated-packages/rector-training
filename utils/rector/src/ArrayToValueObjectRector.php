<?php declare(strict_types=1);

namespace App\Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

final class ArrayToValueObjectRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Stmt\ClassMethod::class];
    }

    /**
     * @param Node\Stmt\ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        $collectedVariables = [];

        /** @var Node\Stmt\Expression $methodStmt */
        foreach ($node->stmts as $methodStmt) {
            $methodStmt = $methodStmt->expr;

            if ($methodStmt instanceof Node\Expr\Assign) {
                // $value['sth'] → $sth
                if ($methodStmt->var instanceof Node\Expr\ArrayDimFetch) {
                    $keyName = $this->getValue($methodStmt->var->dim);

                    $variable = new Node\Expr\Variable(
                        new Node\Identifier($keyName)
                    );
                    $methodStmt->var = $variable;

                    $collectedVariables[] = $variable;
                }
            }
        }

        // return Return_();
        $returnClass = new Node\Name('Return_');
        $new = new Node\Expr\New_($returnClass, $collectedVariables);

        $node->stmts[] = new Node\Stmt\Expression($new);

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
    }
}
