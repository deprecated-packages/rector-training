<?php declare (strict_types=1);

namespace Rector\RectorTraining\TypeHints;

final class MessedUpClass
{
	private $integer;

	private $string;

	private $arrayOfIntegers;

	private $arrayOfStrings;

	private $arrayOfMixed;

	public function returnInteger()
	{
		return 1;
	}

	public function returnString()
	{
		return 'string';
	}

	public function returnArrayOfIntegers()
	{
		return [1, 2];
	}

	public function returnNothingButSaveToProperties()
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
	private function doCalculation($a, $b)
	{
		return $a + $b;
	}
}
