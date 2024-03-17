<?php

namespace Realodix\Relax\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;

class ConfigTest extends TestCase
{
    use ConfigTestProvider;

    /**
     * The input of rule set is valid
     *
     * @dataProvider validRuleSetInputProvider
     */
    public function testValidRuleSetInput($ruleSet): void
    {
        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create($ruleSet)
        );
    }

    /**
     * The input of rule set is invalid
     *
     * @dataProvider invalidRuleSetInputProvider
     */
    public function testInvalidRuleSetInput($ruleSet, $expectException): void
    {
        $this->expectException($expectException);

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create($ruleSet)
        );
    }

    /**
     * User dapat menambahkan/menonaktifkan rules
     */
    public function testUserCanAddLocalRules(): void
    {
        $rules1 = Config::create(new RuleSetFile)->getRules();
        $rules2 = ['foo' => 'bar'];
        $total = count($rules1) + count($rules2);

        $this->assertSame(
            $total,
            count(Config::create(new RuleSetFile, $rules2)->getRules())
        );
    }

    /**
     * Nama aturan ketika user menambahkan aturan lokal
     */
    public function testTheNameOfTheRuleWhenTheUserAddsALocalRule(): void
    {
        $this->assertSame(
            '@RuleSetFile (1 rules)',
            Config::create(new RuleSetFile)->getName()
        );

        $this->assertSame(
            '@RuleSetFile (1 + 1 rules)',
            Config::create(new RuleSetFile, ['foo' => 'bar'])->getName()
        );
    }
}
