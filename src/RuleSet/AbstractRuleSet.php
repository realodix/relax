<?php

namespace Realodix\Relax\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    abstract public function rules(): array;

    public function name(): string
    {
        return '@'.self::classBasename($this);
    }

    /**
     * Get the class basename.
     */
    private static function classBasename(object $class): string
    {
        $class = get_class($class);

        return basename(str_replace('\\', '/', $class));
    }
}
