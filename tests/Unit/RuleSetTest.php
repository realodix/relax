<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;
use Realodix\Relax\Tests\Fixtures\RuleSetWithSetNameFile;

class RuleSetTest extends TestCase
{
    /**
     * Nama yang dikembalikan haruslah nama kelas itu sendiri dengan awalan `@`.
     */
    public function testRuleSetName(): void
    {
        $expected = '@'.(new \ReflectionClass(new RuleSetFile))->getShortName();
        $actual = (new RuleSetFile)->name();

        $this->assertSame($expected, $actual);
    }

    /**
     * Nama yang dikembalikan haruslah nama yang telah ditetapkan di dalam kelas
     * tersebut.
     */
    public function testRuleSetNameWithSetName(): void
    {
        $expected = '@CustomRuleSetName';
        $actual = (new RuleSetWithSetNameFile)->name();

        $this->assertSame($expected, $actual);
    }
}
