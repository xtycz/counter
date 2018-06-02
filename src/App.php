<?php

namespace Xtycz;

class App
{	
	private $operations = []; 

	private $commnadLine;

	public function __construct(CommandLine $commnadLine)
	{
		$this->commnadLine = $commnadLine;
	}
	
	public function addOperation(Operation $operation): App
	{
		$this->operations[] = $operation;
		return $this;
	}

	public function run()
	{
		$this->process(
			$this->getNumberOfExcercises()
		);
	}

	private function getNumberOfExcercises(): int
	{
		$this->commnadLine->write('How many exercises?');
		return (int) $this->commnadLine->read();
	}

	private function process(int $numberOrExcercises): void
	{
		for ($count = 0; $count < $numberOrExcercises; $count++) {
			$this->commnadLine->write(sprintf('%s/%s', $numberOrExcercises, $count + 1));
			
			$operation = $this->getOperation();
			$excercise = $operation->getExcercise();
			$this->commnadLine->write(
				$operation->getDescription() . ': ' .$excercise->getExcercise()
			);
			
			$answer = $this->commnadLine->read();
			if ($excercise->getResult() == $answer) {
				$this->commnadLine->write('Ok');
			} else {
				$this->commnadLine->write('Failed');
			}
		}
	}

	private function getOperation(): Operation
	{
		if (count($this->operations) === 0) {
			throw new \RuntimeException('Some opertion need to be registered');
		}

		return $this->operations[rand(0, count($this->operations) - 1)];
	}
}