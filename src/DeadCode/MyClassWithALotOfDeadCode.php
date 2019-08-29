<?php declare (strict_types=1);

namespace Rector\RectorTraining\DeadCode;

final class MyClassWithALotOfDeadCode extends AbstractParent
{
	/**
	 * @var string
	 */
	private $oh = 'why am i still here?';

	public function sayHello(): void
	{
		parent::sayHello();
	}

	public function calculate(int $a, int $b, int $c): int
	{
		return $this->doCalculation($a, 2, 3);
	}

	private function deadPrivateMethod(): void
	{
		die('With a horrible death!');
	}

	private function doCalculation(int $a = 1, int $b = 2, int $c = 3): int
	{
		return $a + $b + $c;
	}
}
