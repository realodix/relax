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
            ['@PSR1', 'PSR1Set'],
            ['@PhpCsFixer:risky', 'PhpCsFixerRiskySet'],
            ['@PER-CS1.0', 'PERCS1x0Set'],
            ['@PER-CS2.0:risky', 'PERCS2x0RiskySet'],
        ];
    }
}
