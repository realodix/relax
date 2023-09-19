<?php

namespace Realodix\Relax;

final class Utils
{
    public static function pcsfRuleSetNameToClassName(string $ruleSetName): string
    {
        $ruleSetNameWithoutAtSymbol = ltrim($ruleSetName, '@');
        $className = str_replace(
            ['-', '.', ':risky'],
            ['', 'x', 'Risky'],
            $ruleSetNameWithoutAtSymbol
        ).'Set';

        return $className;
    }
}
