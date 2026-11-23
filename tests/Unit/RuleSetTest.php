<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Rulesets\Relax;

class RuleSetTest extends TestCase
{
    public function testRuleSetName(): void
    {
        $expected = '@Realodix/'.(new \ReflectionClass(new Relax))->getShortName();
        $actual = (new Relax)->getName();

        $this->assertSame($expected, $actual);
    }
}
