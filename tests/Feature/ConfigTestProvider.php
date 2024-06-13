<?php

namespace Realodix\Relax\Tests\Feature;

use PhpCsFixer\RuleSet\Sets\PhpCsFixerSet;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;

trait ConfigTestProvider
{
    public static function validRuleSetInputProvider()
    {
        return [
            [new RuleSetFile],
            ['@Realodix'],
            [[]],
        ];
    }

    public static function invalidRuleSetInputProvider()
    {
        return [
            ['Realodix', \InvalidArgumentException::class],
            ['@SetNeverExisted', \InvalidArgumentException::class],
            // If type is used, it should be \TypeError::class
            [new PhpCsFixerSet, \InvalidArgumentException::class],
        ];
    }
}
