<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Xtycz\App(new Xtycz\CommandLine());

$app->addOperation(new Xtycz\SumOperation(10));

$app->run();