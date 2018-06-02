<?php

namespace Xtycz;

use PHPUnit\Framework\TestCase;

class SumOperationTest extends TestCase
{
	public function test_generate_sum_excercise_with_max_0(): void
	{
		$operation = new SumOperation(0);
		$excercise = $operation->getExcercise();
		$this->assertSame('Sum operation', $operation->getDescription());
		$this->assertSame('0 + 0 = ', $excercise->getExcercise());
		$this->assertSame(0, $excercise->getResult());
	}
}