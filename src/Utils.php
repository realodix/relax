<?php

namespace Realodix\Relax;

final class Utils
{
    public static function pcfRuleSetToClassName(string $ruleSetName): string
    {
        $className = ltrim(str_replace(':risky', 'Risky', $ruleSetName), '@').'Set';

        return $className;
    }
}
