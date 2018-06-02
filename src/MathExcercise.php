<?php

namespace Xtycz;

class MathExcercise implements Excercise
{
	private $result;

	private $excercise;

	public function __construct(int $result, string $excercise)
	{
		$this->result = $result;
		$this->excercise = $excercise;
	}

	public function getResult(): int
	{
		return $this->result;
	}

	public function getExcercise(): string
	{
		return $this->excercise;
	}
}