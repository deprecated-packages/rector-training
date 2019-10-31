<?php declare (strict_types=1);

namespace Rector\RectorTraining\Renaming;

final class MyClass
{
	public function create($value): OldClassName
	{
	    // RecordType::recordArg($value, __METHOD__, 0);
	    // int

		$this->oldMethod();

		return new OldClassName();
	}

	public function oldMethod(): void
	{
	    $this->create(5);

		echo 'Hi!';
	}

	public function generateRandom(): int
	{
		return rand(1, 6);
	}
}
