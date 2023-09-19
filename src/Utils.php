<?php

namespace Realodix\Relax;

final class Utils
{
    public static function pcsfRuleSetClass(string $ruleSetName): string
    {
        return 'PhpCsFixer\\RuleSet\\Sets\\'.self::pcsfRuleSetNameToClassName($ruleSetName);
    }

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
