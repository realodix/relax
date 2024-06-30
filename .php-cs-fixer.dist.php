<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;

$localRules = [
    'binary_operator_spaces' => true,
];

$finder = Finder::base()
    ->append(['.php-cs-fixer.dist.php', 'bin/relax']);

return Config::create('Realodix')
    ->setRules($localRules)
    ->setFinder($finder)
    ->setParallelConfig(\PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setCacheFile(__DIR__.'/.tmp/.php-cs-fixer.cache');
