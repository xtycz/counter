<?php

namespace Xtycz;

class SumOperation implements Operation
{
	private $max;

	public function __construct(int $max)
	{
		$this->max = $max;
	}

	public function getDescription(): String
	{
		return 'Sum operation';
	}

	public function getExcercise(): Excercise
	{
		$first = rand(0, $this->max);
		$second = rand(0, $this->max);

		$result = $first + $second;
		$excercise = sprintf('%s + %s = ', $first, $second);

		return new MathExcercise($result, $excercise);
	}
}