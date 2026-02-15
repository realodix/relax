<?php

namespace Realodix\Relax\Rulesets;

/**
 * @internal
 */
abstract class AbstractRuleSetDefinition
{
    public function getName(): string
    {
        $name = substr(static::class, 1 + (int) strrpos(static::class, '\\'));

        return '@Realodix/'.$name;
    }

    public function isRisky(): bool
    {
        return false;
    }
}
