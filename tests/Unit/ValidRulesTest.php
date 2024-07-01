<?php

namespace Realodix\Relax\Tests\Unit;

use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet\RuleSet as PhpCsFixerRuleSet;
use PHPUnit\Framework\TestCase;
use Realodix\Relax\Tests\Utils;

class ValidRulesTest extends TestCase
{
    /**
     * @dataProvider provideAllRelaxRulesets
     */
    public function testValidFixerConfiguration($ruleSet): void
    {
        $rules = Utils::nativeRules($ruleSet->rules());

        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new PhpCsFixerRuleSet($rules));

        $this->assertInstanceOf(FixerFactory::class, $factory);
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
            \sprintf('RuleSet "%s" contains deprecated rule "%s".', $setName, $ruleName)
        );
    }

    /**
     * https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/f391652/tests/RuleSet/RuleSetTest.php#L117
     */
    public static function provideAllRulesFromRulesets(): iterable
    {
        foreach (Utils::ruleSets() as $ruleSet) {
            $setName = $ruleSet->name();
            $rules = Utils::nativeRules($ruleSet->rules());

            foreach ($rules as $rule => $config) {
                yield $setName.':'.$rule => [
                    $setName,
                    $rule,
                    $config,
                ];
            }
        }
    }
}
