<?php

namespace Realodix\Relax\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    abstract public function rules(): array;

    public function name(): string
    {
        $name = substr(static::class, 1 + strrpos(static::class, '\\'));

        return '@'.$name;
    }
}
