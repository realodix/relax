<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Tests\Utils;

class ValidRulesTest extends TestCase
{
    /**
     * @dataProvider provideAllRelaxRulesets
     */
    public function testValidFixerConfiguration($ruleSet): void
    {
        $ruleSet = new \PhpCsFixer\RuleSet\RuleSet($ruleSet->rules());
        $factory = Utils::fixerFactory()
            ->useRuleSet($ruleSet);

        $this->assertInstanceOf(\PhpCsFixer\FixerFactory::class, $factory);
    }

    public static function provideAllRelaxRulesets(): array
    {
        foreach (Utils::ruleSets() as $ruleSet) {
            $nestedArray[] = [$ruleSet];
        }

        return $nestedArray;
    }

    /**
     * No Deprecated Fixers in the Ruleset.
     *
     * https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/f391652/tests/RuleSet/RuleSetTest.php#L117
     *
     * @dataProvider provideAllRulesFromRulesets
     */
    public function testThatThereIsNoDeprecatedFixerInRuleSet($setName, $ruleName): void
    {
        $fixer = Utils::getFixerByName($ruleName);

        $this->assertNotInstanceOf(
            \PhpCsFixer\Fixer\DeprecatedFixerInterface::class,
            $fixer,
            \sprintf('RuleSet "%s" contains deprecated rule "%s".', $setName, $ruleName),
        );
    }

    /**
     * https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/f391652/tests/RuleSet/RuleSetTest.php#L117
     */
    public static function provideAllRulesFromRulesets(): iterable
    {
        foreach (Utils::ruleSets() as $ruleSet) {
            $rulesetName = $ruleSet->name();
            $rules = method_exists($ruleSet, 'mainRules') ? $ruleSet->mainRules() : $ruleSet->rules();

            foreach (Utils::nativeRules($rules) as $rule => $config) {
                yield $rulesetName.':'.$rule => [$rulesetName, $rule, $config];
            }
        }
    }
}
