<?php

namespace Realodix\Relax\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;
use Realodix\Relax\Tests\Fixtures\RuleSetWithSetNameFile;

class ConfigTest extends TestCase
{
    /**
     * The input of rule set is valid
     */
    public function testValidRuleSetInput(): void
    {
        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create(new RuleSetFile)
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
            count(
                Config::create(new RuleSetFile)
                    ->setRules($rules2)->getRules()
            )
        );
    }

    /**
     * Nama aturan ketika user menambahkan aturan lokal
     */
    public function testTheNameOfTheRuleWhenTheUserAddsALocalRule(): void
    {
        $this->assertSame(
            '@RuleSetFile',
            Config::create(new RuleSetFile)->getName()
        );

        $this->assertSame(
            '@CustomRuleSetName',
            Config::create(new RuleSetWithSetNameFile)->getName()
        );
    }
}
