<?php

namespace Realodix\Relax\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    protected string $name = '';

    abstract protected function rules(): array;

    public function getName(): string
    {
        if ($this->name !== '') {
            return $this->name;
        }

        return '@'.self::classBasename($this);
    }

    public function getRules(): array
    {
        return $this->rules();
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
