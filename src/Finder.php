<?php

namespace Realodix\Relax;

/**
 * {@inheritDoc}
 *
 * @see https://symfony.com/doc/current/components/finder.html
 * @see https://github.com/symfony/finder/blob/7.1/Finder.php
 * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/src/Finder.php
 */
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
