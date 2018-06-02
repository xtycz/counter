<?php

namespace Xtycz;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
	public function test_no_opertion_is_registered()
	{
		$commandLine = $this->getMockBuilder(CommandLine::class)
			->setMethods(['read', 'write'])
			->getMock();
		$commandLine->method('read')->willReturn(1);

		$app = new App($commandLine);

		$this->expectException(\RuntimeException::class);
		$app->run();
	}

	public function test_run_one_excercise_with_right_result()
	{
		$commandLine = $this->getMockBuilder(CommandLine::class)
			->setMethods(['read', 'write'])
			->getMock();
		$commandLine->expects($this->exactly(2))
			->method('read')
			->willReturn(1);

		$commandLine->expects($this->at(5))
			->method('write')
			->with('Ok');

		$excercise = $this->getMockBuilder(Excercise::class)
			->setMethods(['getResult', 'getExcercise'])
			->getMock();
		$excercise->expects($this->once())
			->method('getResult')
			->willReturn(1);
		$excercise->expects($this->once())
			->method('getExcercise');

		$operation = $this->getMockBuilder(Operation::class)
			->setMethods(['getDescription', 'getExcercise'])
			->getMock();
		$operation->expects($this->once())
			->method('getDescription');
		$operation->expects($this->once())
			->method('getExcercise')
			->willReturn($excercise);


		$app = new App($commandLine);
		$app->addOperation($operation);
		$app->run();
	}

		public function test_run_one_excercise_with_wrong_result()
	{
		$commandLine = $this->getMockBuilder(CommandLine::class)
			->setMethods(['read', 'write'])
			->getMock();
		$commandLine->expects($this->exactly(2))
			->method('read')
			->willReturn(1);

		$commandLine->expects($this->at(5))
			->method('write')
			->with('Failed');

		$excercise = $this->getMockBuilder(Excercise::class)
			->setMethods(['getResult', 'getExcercise'])
			->getMock();
		$excercise->expects($this->once())
			->method('getResult')
			->willReturn(2);
		$excercise->expects($this->once())
			->method('getExcercise');

		$operation = $this->getMockBuilder(Operation::class)
			->setMethods(['getDescription', 'getExcercise'])
			->getMock();
		$operation->expects($this->once())
			->method('getDescription');
		$operation->expects($this->once())
			->method('getExcercise')
			->willReturn($excercise);


		$app = new App($commandLine);
		$app->addOperation($operation);
		$app->run();
	}
}