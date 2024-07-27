<?php

namespace Realodix\Relax\Tests\Integration;

class RelaxRulesetTest extends IntegrationTestCase
{
    public function testRelaxRuleset(): void
    {
        $this->testFixture('relax');
    }

    public function testRelaxCustom(): void
    {
        $this->testFixture('relax', 'custom');
    }

    public function testRelaxCleanup(): void
    {
        $this->testFixture('relax', 'deprecated');
    }
}
