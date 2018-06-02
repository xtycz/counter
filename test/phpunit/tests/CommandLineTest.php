<?php

namespace Xtycz;

use PHPUnit\Framework\TestCase;

class CommandLineTest extends TestCase
{
	public function test_read()
	{
		$commandLine = new CommandLine(__DIR__ . '/../resource/input.txt');
		$this->assertSame('10', $commandLine->read());
	}

	public function test_write()
	{
		$commandLine = new CommandLine();
		ob_start();
		$commandLine->write("hello");
		$result = ob_get_clean();
		$this->assertSame("hello" . PHP_EOL, $result);
	}
}