<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class CleanupAppStaticCallsRector extends AbstractRector
{
    /**
     * @var CakePHPStaticCallAnalyzer
     */
    private $cakePHPStaticCallAnalyzer;

    public function __construct(CakePHPStaticCallAnalyzer $cakePHPStaticCallAnalyzer)
    {
        $this->cakePHPStaticCallAnalyzer = $cakePHPStaticCallAnalyzer;
    }

    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    /**
     * @param StaticCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->cakePHPStaticCallAnalyzer->isAppUsesStaticCall($node)) {
            return null;
        }

        $this->removeNode($node);

        return null;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
