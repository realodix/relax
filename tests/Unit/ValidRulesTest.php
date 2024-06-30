<?php

namespace Realodix\Relax\Tests\Unit;

use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet\RuleSet as PhpCsFixerRuleSet;
use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;

class ValidRulesTest extends TestCase
{
    /**
     * @Realodix set returns a valid PhpCsFIxer rules.
     */
    public function testRealodixReturnsAValidPhpCsFIxerRules(): void
    {
        $rules = $this->resolveRules(new \Realodix\Relax\RuleSet\Sets\Realodix);
        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new PhpCsFixerRuleSet($rules));

        $this->assertIsArray($factory->getFixers());
    }

    /**
     * @RealodixPlus set returns a valid PhpCsFIxer rules.
     */
    public function testRealodixPlusReturnsAValidPhpCsFIxerRules(): void
    {
        $rules = $this->resolveRules(new \Realodix\Relax\RuleSet\Sets\RealodixPlus);
        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new PhpCsFixerRuleSet($rules));

        $this->assertIsArray($factory->getFixers());
    }

    /**
     * Remove PHP-CS-Fixer rule sets (@...) and custom fixer.
     */
    protected function resolveRules($ruleSet): array
    {
        $rules = Config::create($ruleSet)->getRules();

        foreach ($rules as $key => $value) {
            if (preg_match('/^(@|[a-zA-Z0-9]+\/)/', $key)) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }
}
