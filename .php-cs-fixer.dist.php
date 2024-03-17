<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;

$localRules = [
    // ...
];

$finder = Finder::base()
    ->append(['.php-cs-fixer.dist.php', 'bin/relax']);

return Config::create('@Realodix', $localRules)
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.tmp/.php-cs-fixer.cache');
