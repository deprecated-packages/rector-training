<?php declare (strict_types=1);

namespace Rector\RectorTraining\DeadCode;

abstract class AbstractParent
{
	public function __construct()
	{
	}

	public function sayHello(): void
	{
		echo 'Hello';
	}
}
