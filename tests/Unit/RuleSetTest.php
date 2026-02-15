<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Rulesets\Relax;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;
use Realodix\Relax\Tests\Fixtures\RuleSetWithSetNameFile;

class RuleSetTest extends TestCase
{
    public function testRuleSetName(): void
    {
        $expected = '@Realodix/'.(new \ReflectionClass(new Relax))->getShortName();
        $actual = (new Relax)->getName();

        $this->assertSame($expected, $actual);
    }

    public function testRuleSetNameOld(): void
    {
        $expected = '@'.(new \ReflectionClass(new RuleSetFile))->getShortName();
        $actual = (new RuleSetFile)->name();

        $this->assertSame($expected, $actual);
    }

    public function testRuleSetNameWithSetName(): void
    {
        $expected = '@CustomRuleSetName';
        $actual = (new RuleSetWithSetNameFile)->name();

        $this->assertSame($expected, $actual);
    }
}
