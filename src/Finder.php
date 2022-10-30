<?php

namespace Realodix\Relax;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    /**
     * @param string|list<string>|null $baseDir
     */
    public static function base($baseDir = null): PhpCsFixerFinder
    {
        $baseDir = self::baseDir($baseDir);

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
     * @param string|list<string>|null $baseDir
     */
    public static function laravel($baseDir = null): PhpCsFixerFinder
    {
        return self::base($baseDir)
            ->exclude([
                'bootstrap/cache',
                'public',
                'resources',
                'storage',
            ])->notName('*.blade.php');
    }

    /**
     * @param string|list<string>|null $baseDir
     * @return string|list<string>
     */
    private static function baseDir($baseDir)
    {
        $currentWorkingDir = getcwd() === false ? '' : getcwd();

        if (is_null($baseDir)) {
            $baseDir = $currentWorkingDir;
        }

        return $baseDir;
    }
}
