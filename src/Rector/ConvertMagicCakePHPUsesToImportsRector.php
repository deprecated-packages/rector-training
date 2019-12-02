<?php declare(strict_types=1);

namespace Rector\RectorTraining\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\Stmt\UseUse;
use Rector\FileSystemRector\Rector\AbstractFileSystemRector;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;
use Symplify\PackageBuilder\FileSystem\SmartFileInfo;

final class ConvertMagicCakePHPUsesToImportsRector extends AbstractFileSystemRector
{
    /**
     * @var CakePHPStaticCallAnalyzer
     */
    private $cakePHPStaticCallAnalyzer;

    public function __construct(CakePHPStaticCallAnalyzer $cakePHPStaticCallAnalyzer)
    {
        $this->cakePHPStaticCallAnalyzer = $cakePHPStaticCallAnalyzer;
    }

    public function refactor(SmartFileInfo $smartFileInfo): void
    {
        $fileNodes = $this->parseFileInfoToNodes($smartFileInfo);

        $namespace = $this->betterNodeFinder->findFirstInstanceOf($fileNodes, Namespace_::class);

        $useImports = $this->collectAllUseImports($fileNodes);
        // nothing to import → skip
        if ($useImports === []) {
            return;
        }

        // 1. add namespace if missing
        if ($namespace === null) {
            // @todo use custom namespace instead of "App"
            $namespace = new Namespace_(new Name('App'));
        }

        // 2. remove static calls
//        $fileNodes = $this->removeAppImportStaticCalls($fileNodes);

        // 3. add use imports under the namesapace
        $useNodes = $this->createUseNodes($useImports);
        $namespace->stmts = array_merge($useNodes, $fileNodes);

        // 4. print file back
        $this->printNodesToFilePath([$namespace], $smartFileInfo->getRealPath());
    }

    /**
     * @param Node[] $fileNodes
     * @return string[]
     */
    private function collectAllUseImports(array $fileNodes): array
    {
        $useImports = [];

        $this->traverseNodesWithCallable($fileNodes, function (Node $node) use (&$useImports) {
            if (! $this->cakePHPStaticCallAnalyzer->isAppUsesStaticCall($node)) {
                return null;
            }

            // now we know it's "App::uses()"
            $firstArgumentValue = $node->args[0]->value;
            $useImports[] = $this->getValue($firstArgumentValue);

            $this->removeNode($node);
        });

        return array_unique($useImports);
    }

    /**
     * Creates: "use SomeImportedClass;"
     *
     * @param string[] $useImports
     * @return Use_[]
     */
    private function createUseNodes(array $useImports): array
    {
        $useNodes = [];
        foreach ($useImports as $useImport) {
            $useNodes[] = new Use_([
                new UseUse(new Name($useImport))
            ]);
        }

        return $useNodes;
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }

    /**
     * @param Node[] $fileNodes
     * @return Node[]
     */
    private function removeAppImportStaticCalls(array $fileNodes): array
    {
        foreach ($fileNodes as $key => $fileNode) {
            // App::list();
            if ($fileNode instanceof Expression) {
                // App::list()
                $fileNode = $fileNode->expr;
            }

            if (!$this->cakePHPStaticCallAnalyzer->isAppUsesStaticCall($fileNode)) {
                continue;
            }

            unset($fileNodes[$key]);
        }

        return $fileNodes;
    }
}
