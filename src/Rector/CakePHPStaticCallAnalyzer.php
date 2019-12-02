<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use Rector\PhpParser\Node\Resolver\NameResolver;

final class CakePHPStaticCallAnalyzer
{
    /**
     * @var NameResolver
     */
    private $nameResolver;

    public function __construct(NameResolver $nameResolver)
    {
        $this->nameResolver = $nameResolver;
    }

    public function isAppUsesStaticCall(Node $node): bool
    {
        if (!$node instanceof StaticCall) {
            return false;
        }

        if (!$this->nameResolver->isName($node->class, 'App')) {
            return false;
        }

        if (!$this->nameResolver->isName($node->name, 'uses')) {
            return false;
        }

        return true;
    }
}
