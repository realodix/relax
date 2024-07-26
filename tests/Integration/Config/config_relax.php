<?php

use PhpCsFixer\Finder;
use Realodix\Relax\Config;

$finder = (new Finder)->in('./tests/Integration/tmp');

return Config::create('relax')
    ->setFinder($finder)
    ->setUsingCache(false);
