<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Utils;

class UtilsTest extends TestCase
{
    /**
     * @test
     * @dataProvider pcsfRuleSetNameToClassNameProvider
     */
    public function pcsfRuleSetNameToClassName($actual, $expected): void
    {
        $className = Utils::pcsfRuleSetNameToClassName($actual);

        $this->assertSame($expected, $className);
    }

    public static function pcsfRuleSetNameToClassNameProvider()
    {
        return [
            '@PSR1'             => ['@PSR1', 'PSR1Set'],
            '@PhpCsFixer:risky' => ['@PhpCsFixer:risky', 'PhpCsFixerRiskySet'],
            '@PER-CS1.0'        => ['@PER-CS1.0', 'PERCS1x0Set'],
            '@PER-CS1.0:risky'  => ['@PER-CS1.0:risky', 'PERCS1x0RiskySet'],
        ];
    }

    /**
     * @test
     * @dataProvider pcsfRuleSetClassExistsProvider
     */
    public function pcsfRuleSetClassExists($ruleSetName): void
    {
        $class = 'PhpCsFixer\\RuleSet\\Sets\\'.Utils::pcsfRuleSetNameToClassName($ruleSetName);

        $this->assertTrue(class_exists($class));
    }

    public static function pcsfRuleSetClassExistsProvider()
    {
        return [
            '@PSR1'             => ['@PSR1'],
            '@PhpCsFixer:risky' => ['@PhpCsFixer:risky'],
            '@PER-CS1.0'        => ['@PER-CS1.0'],
            '@PER-CS1.0:risky'  => ['@PER-CS1.0:risky'],
            '@PHP80Migration'   => ['@PHP80Migration'],
            '@PHP80Migration:risky' => ['@PHP80Migration:risky'],
        ];
    }
}
