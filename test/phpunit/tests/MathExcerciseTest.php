<?php

namespace Xtycz;

use PHPUnit\Framework\TestCase;

class MathExcerciseTest extends TestCase
{ 
	public function test_returns_parameters_pased_trough_constuctor(): void
	{

		$excercise = new MathExcercise(2, '1 + 1 =');

		$this->assertSame(2, $excercise->getResult());
		$this->assertSame('1 + 1 =', $excercise->getExcercise());
	}
}