<?php
// node_type: "Declare_"
declare(strict_types=1);
// name of class, full path
// node_type: "StaticCall"
\App::uses(
    // node_type: "Arg"
    'NameOfClass',
    // node_type: "Arg"
    'Directory/Name'
);
# ↓
# use Directory\Name\NameOfClass;
// node_type: "Class_"
// name: "CakePHPFakeNamespace"
final class CakePHPFakeNamespace
{
    // node_type: "ClassMethod"
    public function run()
    {
        // NameOfClass::someMethod()
        // node_type: "Nop"
    }
}