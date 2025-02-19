<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;
use Realodix\Relax\Tests\Fixtures\RuleSetWithSetNameFile;

class RuleSetTest extends TestCase
{
    /**
     * The name must be the name of the class itself with an `@` prefix.
     */
    public function testRuleSetName(): void
    {
        $expected = '@'.(new \ReflectionClass(new RuleSetFile))->getShortName();
        $actual = (new RuleSetFile)->name();

        $this->assertSame($expected, $actual);
    }

    /**
     * The name must be the name defined in the class.
     */
    public function testRuleSetNameWithSetName(): void
    {
        $expected = '@CustomRuleSetName';
        $actual = (new RuleSetWithSetNameFile)->name();

        $this->assertSame($expected, $actual);
    }
}
