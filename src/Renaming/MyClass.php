<?php declare (strict_types=1);

namespace Rector\RectorTraining\Renaming;

final class MyClass
{
	public function create(): OldClassName
	{
		$this->oldMethod();

		return new OldClassName();
	}

	public function oldMethod(): void
	{
		echo 'Hi!';
	}

	public function generateRandom(): int
	{
		return rand(1, 6);
	}
}
