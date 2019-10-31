<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

<<<<<<< HEAD
use PhpParser\Builder\Property;
use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use Rector\NodeContainer\ParsedNodesByType;
use Rector\NodeTypeResolver\Node\AttributeKey;
=======
use PhpParser\Node;
>>>>>>> camelize rector
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;
use Symplify\PackageBuilder\Strings\StringFormatConverter;

final class CamelizeRector extends AbstractRector
{
    /**
     * @var StringFormatConverter
     */
    private $stringFormatConverter;

<<<<<<< HEAD
    /**
     * @var ParsedNodesByType
     */
    private $parsedNodesByType;

    public function __construct(StringFormatConverter $stringFormatConverter, ParsedNodesByType $parsedNodesByType)
    {
        $this->stringFormatConverter = $stringFormatConverter;
        $this->parsedNodesByType = $parsedNodesByType;
=======
    public function __construct(StringFormatConverter $stringFormatConverter)
    {
        $this->stringFormatConverter = $stringFormatConverter;
>>>>>>> camelize rector
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
<<<<<<< HEAD
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

=======
        return [Node\Expr\Variable::class];
    }

    /**
     * @param Node\Expr\Variable $node
     */
    public function refactor(Node $node): ?Node
    {
>>>>>>> camelize rector
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
