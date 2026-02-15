<?php

namespace Realodix\Relax\Tests\Integration;

class RelaxRulesetTest extends IntegrationTestCase
{
    /**
     * @runInSeparateProcess
     *
     * @dataProvider provideAllRelaxRulesets
     */
    public function testRuleset($name, $suffix): void
    {
        $this->testFixture($name, $suffix);
    }

    public static function provideAllRelaxRulesets(): array
    {
        return [
            ['relax', null],
            ['relax', 'commonbox'],
            ['relax', 'commonbox2'],
            ['relax', 'custom'],
            ['relax', 'deprecated'],
            ['relaxplus', null],
            ['realodixspec', null],
        ];
    }
}
