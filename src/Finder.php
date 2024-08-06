<?php

namespace Realodix\Relax;

class Finder extends \PhpCsFixer\Finder
{
    /**
     * @return \PhpCsFixer\Finder
     */
    public static function base()
    {
        return self::create()
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->notName([
                '_ide_helper_actions.php',
                '_ide_helper_models.php',
                '_ide_helper.php',
                '.phpstorm.meta.php',
            ])->exclude([
                'node_modules',
            ]);
    }

    /**
     * @return \PhpCsFixer\Finder
     */
    public static function laravel()
    {
        return self::base()
            ->exclude([
                'bootstrap/cache',
                'public',
                'resources',
                'storage',
            ])->notName('*.blade.php');
    }
}
