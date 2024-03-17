<?php

namespace Realodix\Relax\Tests\Unit;

use PhpCsFixer\Finder as PhpCsFixerFinder;
use PHPUnit\Framework\TestCase;
use Realodix\Relax\Finder;

class FinderTest extends TestCase
{
    /**
     * It returns a PHP CS Fixer finder object
     */
    public function testBaseFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::base(__DIR__);

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }

    /**
     * It returns a PHP CS Fixer finder object
     */
    public function testLaravelFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::laravel(__DIR__.'/../..');

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }
}
