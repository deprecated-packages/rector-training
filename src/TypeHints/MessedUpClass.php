<?php declare (strict_types=1);

namespace Rector\RectorTraining\TypeHints;

final class MessedUpClass
{
	/**
	 * @var int
	 */
	private $integer;

	/**
	 * @var string
	 */
	private $string;

	/**
	 * @var int[]
	 */
	private $arrayOfIntegers;

	/**
	 * @var string[]
	 */
	private $arrayOfStrings;

	/**
	 * @var int[]|string[]
	 */
	private $arrayOfMixed;

	public function returnInteger(): int
	{
		return 1;
	}

	public function returnString(): string
	{
		return 'string';
	}

	/**
	 * @return int[]
	 */
	public function returnArrayOfIntegers(): array
	{
		return [1, 2];
	}

	public function returnNothingButSaveToProperties(): void
	{
		$this->integer = 420;
		$this->string = 'a bc';
		$this->arrayOfIntegers = [1, 2, 3];
		$this->arrayOfStrings = ['a', 'b'];
		$this->arrayOfMixed = ['a', 1];
	}

	public function calculate()
	{
		return $this->doCalculation(1, 2);
	}

	/**
	 * @param int $a
	 * @param int $b
	 */
	private function doCalculation(int $a, int $b): int
	{
		return $a + $b;
	}
}
