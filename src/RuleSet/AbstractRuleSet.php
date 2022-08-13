<?php

namespace Realodix\Relax\RuleSet;

use Realodix\Relax\Helper;

abstract class AbstractRuleSet implements RuleSetInterface
{
    protected string $name = '';

    abstract protected function rules(): array;

    public function getName(): string
    {
        if ($this->name !== '') {
            return $this->name;
        }

        return '@'.Helper::classBasename($this);
    }

    public function getRules(): array
    {
        return $this->rules();
    }
}
