<?php declare (strict_types=1);

namespace Rector\RectorTraining\Php74;

use Rector\RectorTraining\TypeHints\MessedUpClass;

final class TypedProperties
{
	/**
	 * @var MessedUpClass|null
	 */
	public $anotherClass = null;

	/**
	 * @var string
	 */
	public $string;

	/**
	 * @var string
	 */
	public $surname;

	/**
	 * @var bool
	 */
	public $name = 'not_a_bool';

	/**
	 * @var iterable
	 */
	public $iterable = [1, 2, 3];

	public function run()
	{
		if ($this->string !== '') {
			return $this->string;
		}
		return $this->surname;
	}

	public function anonymous()
	{
		$value = function($name) {
			return $name . ', lets party!';
		};
		return $value('People');
	}
}
