<?php

App::import('SomeClass', 'SomeDir\Namespace');

final class CakePHPFakeNamespace
{
    public function run()
    {
        App::import('Another', 'AnotherDir\Namespace');
    }
}
