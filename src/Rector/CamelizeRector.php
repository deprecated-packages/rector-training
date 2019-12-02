<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Builder\Property;
use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use Rector\NodeContainer\ParsedNodesByType;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;
use Symplify\PackageBuilder\Strings\StringFormatConverter;

final class CamelizeRector extends AbstractRector
{
    /**
     * @var StringFormatConverter
     */
    private $stringFormatConverter;

    /**
     * @var ParsedNodesByType
     */
    private $parsedNodesByType;

    public function __construct(StringFormatConverter $stringFormatConverter, ParsedNodesByType $parsedNodesByType)
    {
        $this->stringFormatConverter = $stringFormatConverter;
        $this->parsedNodesByType = $parsedNodesByType;
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Name::class, Node\Identifier::class];
    }

    /**
     * @param Variable|PropertyFetch|Node\Stmt\PropertyProperty $node
     */
    public function refactor(Node $node): ?Node
    {
        $parentNode = $node->getAttribute(AttributeKey::PARENT_NODE);
        if (! $parentNode instanceof Variable && ! $parentNode instanceof PropertyFetch && ! $parentNode instanceof Node\Stmt\PropertyProperty) {
            return null;
        }

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
