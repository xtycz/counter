<?php

namespace Xtycz;

class CommandLine
{
	private $stream;

	public function __construct(string $stream = "php://stdin")
	{
		$this->stream = $stream;
	}

	public function write(string $text): void
	{
		echo $text . PHP_EOL;
	}

	public function read(): string
	{
		$handle = fopen($this->stream, "r");
		$line = trim(fgets($handle));
		fclose($handle);

		return $line;
	}
}
