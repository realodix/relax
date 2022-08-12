<?php

namespace Realodix\Relax;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    /**
     * @param string|string[] $baseDir
     */
    public static function base($baseDir = ''): PhpCsFixerFinder
    {
        ($baseDir === '') && ($baseDir = getcwd());

        return PhpCsFixerFinder::create()
            ->in($baseDir)
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->notName([
                '_ide_helper_actions.php',
                '_ide_helper_models.php',
                '_ide_helper.php',
                '.phpstorm.meta.php',
            ]);
    }

    /**
     * @param string|string[] $baseDir
     */
    public static function laravel($baseDir = ''): PhpCsFixerFinder
    {
        return self::base($baseDir)
            ->exclude([
                'bootstrap/cache',
                'public',
                'resources',
                'storage',
                'node_modules',
            ])
            ->notName('*.blade.php');
    }
}
