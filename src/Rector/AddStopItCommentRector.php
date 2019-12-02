<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Expr\Variable;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class AddStopItCommentRector extends AbstractRector
{
    /**
     * @var string[]
     */
    private $variableNameToCommentMap = [];

    /**
     * @param string[] $variableNameToCommentMap
     */
    public function __construct(array $variableNameToCommentMap)
    {
        $this->variableNameToCommentMap = $variableNameToCommentMap;
    }

    public function getNodeTypes(): array
    {
        return [Node\Stmt\Return_::class];
    }

    /**
     * @param Node\Stmt\Return_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node->expr instanceof Variable) {
            return null;
        }

        foreach ($this->variableNameToCommentMap as $variableName => $comment) {
            if ($this->isName($node->expr, $variableName)) {
                $doc = new Doc('// ' . $comment);
                $node->setDocComment($doc);

                return $node;
            }
        }

        return null;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
