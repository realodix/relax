<?php

use PhpCsFixer\Finder;
use Realodix\Relax\Config;
use Realodix\Relax\RuleSet\Sets\RelaxPlus;

$finder = (new Finder)->in('./tests/Integration/tmp');

return Config::create(new RelaxPlus)
    ->setFinder($finder)
    ->setUsingCache(false);
