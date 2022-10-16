<?php

namespace Realodix\Relax\Tests\Feature;

use PhpCsFixer\RuleSet\Sets\PhpCsFixerSet;
use Realodix\Relax\Tests\Fixtures\RuleSetFile;

trait ConfigTestProvider
{
    public function validRuleSetInputProvider()
    {
        return [
            [new RuleSetFile],
            ['@Realodix'],
            ['@PSR2'],
            ['@PhpCsFixer:risky'],
            [[]],
        ];
    }

    public function invalidRuleSetInputProvider()
    {
        return [
            ['Realodix', \InvalidArgumentException::class],
            ['@SetNeverExisted', \InvalidArgumentException::class],
            // If type is used, it should be \TypeError::class
            [new PhpCsFixerSet, \InvalidArgumentException::class],
        ];
    }
}
