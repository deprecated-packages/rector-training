<?php declare (strict_types=1);

namespace Rector\RectorTraining\DeadCode;

final class MyClassWithALotOfDeadCode extends AbstractParent
{
	public function sayHello(): void
	{
		parent::sayHello();
	}
	public function calculate(int $a): int
	{
		return $this->doCalculation($a);
	}
	private function doCalculation(int $a = 1, int $b = 2, int $c = 3): int
	{
		return $a + $b + $c;
	}
}
