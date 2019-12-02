<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\DeclareDeclare;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class ChangeIntegersToStringsRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [LNumber::class];
    }

    /**
     * @param LNumber $node
     */
    public function refactor(Node $node): ?Node
    {
        // skip declare(...)
        $parentNode = $node->getAttribute(AttributeKey::PARENT_NODE);
        if ($parentNode instanceof DeclareDeclare) {
            return null;
        }

        return new String_((string) $node->value);
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
