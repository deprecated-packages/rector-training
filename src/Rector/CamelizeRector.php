<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;
use Symplify\PackageBuilder\Strings\StringFormatConverter;

final class CamelizeRector extends AbstractRector
{
    /**
     * @var StringFormatConverter
     */
    private $stringFormatConverter;

    public function __construct(StringFormatConverter $stringFormatConverter)
    {
        $this->stringFormatConverter = $stringFormatConverter;
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Expr\Variable::class];
    }

    /**
     * @param Node\Expr\Variable $node
     */
    public function refactor(Node $node): ?Node
    {
        $variableName = $this->getName($node);

        // no "_" in the string
        if (strpos($variableName, '_') === false) {
            return null;
        }

        $camelizedName = $this->stringFormatConverter->underscoreAndHyphenToCamelCase($variableName);
        $node->name = $camelizedName;

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}
