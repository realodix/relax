<?php

namespace Realodix\Relax\RuleSet;

interface RuleSetInterface
{
    /**
     * Returns the name of the rule set
     */
    public function name(): string;

    /**
     * Returns an array of rules along with their configuration
     *
     * @return array<string, array<string, mixed>|bool>
     */
    public function rules(): array;
}
