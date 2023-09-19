<?php

namespace Realodix\Relax\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Utils;

class UtilsTest extends TestCase
{
    /**
     * @test
     * @dataProvider resolveClassNameProvider
     */
    public function resolveClassName($actual, $expected): void
    {
        $className = Utils::pcfRuleSetToClassName($actual);

        $this->assertSame($expected, $className);
    }

    public static function resolveClassNameProvider()
    {
        return [
            ['@Realodix', 'RealodixSet'],
            ['@PSR1', 'PSR1Set'],
            ['@PhpCsFixer:risky', 'PhpCsFixerRiskySet'],
            ['@PER-CS1.0', 'PERCS1x0Set'],
            ['@PER-CS2.0:risky', 'PERCS2x0RiskySet']
        ];
    }
}
