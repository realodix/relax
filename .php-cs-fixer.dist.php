<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;

$rules = [
    // ...
    '@Realodix/Relax' => true,
];

$finder = Finder::base()
    ->in(__DIR__)
    ->append(['.php-cs-fixer.dist.php', 'bin/relax'])
    ->notName('*_actual.php');

return Config::this()
    ->setRules($rules)
    ->setFinder($finder)
    ->setParallelConfig(\PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setCacheFile(__DIR__.'/.tmp/.php-cs-fixer.cache');
