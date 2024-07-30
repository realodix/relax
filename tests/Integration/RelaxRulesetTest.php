<?php

namespace Realodix\Relax\Tests\Integration;

class RelaxRulesetTest extends IntegrationTestCase
{
    public function testRelaxRuleset(): void
    {
        $this->testFixture('relax');
    }

    public function testRelaxBox(): void
    {
        $this->testFixture('relax', 'commonbox');
    }

    public function testRelaxBoxTwo(): void
    {
        $this->testFixture('relax', 'commonbox2');
    }

    public function testRelaxCustom(): void
    {
        $this->testFixture('relax', 'custom');
    }

    public function testRelaxCleanup(): void
    {
        $this->testFixture('relax', 'deprecated');
    }

    public function testRelaxPlusRuleset(): void
    {
        $this->testFixture('relaxplus');
    }

    public function testRealodixSpec(): void
    {
        $this->testFixture('realodixspec');
    }
}
