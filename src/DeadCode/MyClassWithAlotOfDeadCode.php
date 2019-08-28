<?php declare (strict_types=1);

namespace Rector\RectorTraining\DeadCode;

final class MyClassWithAlotOfDeadCode extends AbstractParent
{
	public function sayHello(): void
	{
		parent::sayHello();
	}


	private function deadPrivateMethod(): void
	{
		// This is public method and is not called anywhere in our project!
	}
}
