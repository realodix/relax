<?php

namespace Realodix\Relax;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    /**
     * @param null|string|list<string> $baseDir
     * @return \PhpCsFixer\Finder
     */
    public static function base($baseDir = null)
    {
        if ($baseDir === null) {
            $baseDir = getcwd() === false ? '' : getcwd();
        }

        return PhpCsFixerFinder::create()
            ->in($baseDir)
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->notName([
                '_ide_helper_actions.php',
                '_ide_helper_models.php',
                '_ide_helper.php',
                '.phpstorm.meta.php',
            ])->exclude([
                'build',
                'node_modules',
            ]);
    }

    /**
     * @param null|string|list<string> $baseDir
     * @return \PhpCsFixer\Finder
     */
    public static function laravel($baseDir = null)
    {
        return self::base($baseDir)
            ->exclude([
                'bootstrap/cache',
                'public',
                'resources',
                'storage',
            ])->notName('*.blade.php');
    }
}
