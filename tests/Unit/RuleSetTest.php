<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;
use Realodix\Relax\RuleSet\RuleSet;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;
use Realodix\Relax\Tests\Fixtures\RuleSetWithSetNameFile;

class RuleSetTest extends TestCase
{
    /**
     * It implements only interface methods
     */
    public function testItImplementsOnlyInterfaceMethods(): void
    {
        $reflect = new \ReflectionClass(new RuleSetFile);
        $this->assertCount(0, $reflect->getMethods(\ReflectionMethod::IS_PROTECTED));
        $this->assertCount(2, $reflect->getMethods(\ReflectionMethod::IS_PUBLIC));
    }

    /**
     * Nama yang dikembalikan haruslah string yang diimput itu sendiri.
     */
    public function testRuleSetNameWithStringInput(): void
    {
        $actual = Config::create('@Realodix')->getName();

        $this->assertStringStartsWith('@Realodix', $actual);
    }

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
        $actual = (new RuleSet(new RuleSetWithSetNameFile))->getName();

        $this->assertSame($expected, $actual);
    }

    /**
     * Nama yang dikembalikan haruslah nama yang telah ditetapkan oleh Relax.
     */
    public function testNameReturnedByLocalRule(): void
    {
        $actual = Config::create([])->getName();

        $this->assertStringContainsString('Local', $actual);
    }
}
