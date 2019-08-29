<?php declare (strict_types=1);

namespace Rector\RectorTraining\CodeQuality;

final class CodeQualityClass
{
	public function saveValues(): void
	{
		$values = [1, 5, 3];
		usort($values, [$this, 'compareFunction']);

		$this->values = $values;
	}

	private function compareFunction($first, $second): int
	{
		return $first <=> $second;
	}
}
