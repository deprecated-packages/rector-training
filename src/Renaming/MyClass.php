<?php declare (strict_types=1);

namespace Rector\RectorTraining\Renaming;

use Rector\Renaming\Tests\Rector\Class_\RenameClassRector\Source\OldClassWithTypo;

final class MyClass
{
	public function create($value): OldClassName
	{
	    // RecordType::recordArg($value, __METHOD__, 0);
	    // int

		$this->oldMethod();

		return new OldClassName();
	}

	public function newMethod(): void
	{
	    $this->create(5);

		echo 'Hi!';
	}

	public function generateRandom(): int
	{
		return random_int(1, 6);
	}
}
