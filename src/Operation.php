<?php

namespace Xtycz;

interface Operation
{
	public function getDescription(): String;

	public function getExcercise(): Excercise;
}