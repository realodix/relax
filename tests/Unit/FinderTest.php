<?php

namespace Realodix\Relax\Tests\Unit;

use PhpCsFixer\Finder as PhpCsFixerFinder;
use PHPUnit\Framework\TestCase;
use Realodix\Relax\Finder;

class FinderTest extends TestCase
{
    public function testFinderMustReturnsAPhpCsFinderObject(): void
    {
        $this->assertInstanceOf(PhpCsFixerFinder::class, new Finder);
        $this->assertInstanceOf(PhpCsFixerFinder::class, Finder::create());
    }

    public function testBaseFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::base(__DIR__);

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }

    public function testLaravelFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::laravel(__DIR__.'/../..');

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }
}
