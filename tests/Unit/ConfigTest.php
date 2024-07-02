<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;

class ConfigTest extends TestCase
{
    public function testSetRuleset(): void
    {
        $this->assertSame('@RuleSetFile', Config::create(new RuleSetFile)->getName());
    }

    public function testSetRulesetWithStringInput(): void
    {
        $this->assertSame('@Realodix', Config::create('realodix')->getName());
    }

    public function testSetRulesetWithInvalidStringInput(): void
    {
        $this->expectException(\Realodix\Relax\Exceptions\RulesetNotFoundException::class);

        Config::create('wrong-rule-set')->getName();
    }

    public function testAddLocalRules(): void
    {
        $rules1 = (new RuleSetFile)->rules();
        $rules2 = ['foo' => 'bar'];

        $this->assertSame(
            count($rules1) + count($rules2),
            count(
                Config::create(new RuleSetFile)
                    ->setRules($rules2)->getRules()
            )
        );
    }

    public function testOnlyLocalRules(): void
    {
        $rules = Config::create()->setRules(['foo' => 'bar']);

        $this->assertSame(1, count($rules->getRules()));
        $this->assertSame(Config::LOCAL_RULES_NAME, $rules->getName());
    }
}
