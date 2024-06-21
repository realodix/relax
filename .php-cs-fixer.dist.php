<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;
use Realodix\Relax\RuleSet\Sets\Realodix;

$localRules = [
    'binary_operator_spaces' => true,
];

$finder = Finder::base()
    ->append(['.php-cs-fixer.dist.php', 'bin/relax']);

return Config::create(new Realodix, $localRules)
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.tmp/.php-cs-fixer.cache');
