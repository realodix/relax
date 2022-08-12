<?php

namespace Realodix\Relax\RuleSet;

interface RuleSetInterface
{
    /**
     * Returns the name of the rule set
     */
    public function getName(): string;

    /**
     * Returns an array of rules along with their configuration
     */
    public function getRules(): array;
}
