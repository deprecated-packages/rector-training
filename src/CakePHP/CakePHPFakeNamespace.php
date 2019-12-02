<?php declare (strict_types=1);

// name of class, full path
App::uses('NameOfClass', 'Directory/Name');
# ↓
# use Directory\Name\NameOfClass;

final class CakePHPFakeNamespace
{
    public function run()
    {
        // NameOfClass::someMethod()
    }
}
