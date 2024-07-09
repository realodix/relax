<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;

/**
 * @deprecated use `relax` instead
 */
final class Realodix extends AbstractRuleSet
{
    /**
     * Inherit the rules from Laravel
     *
     * @see \Realodix\Relax\RuleSet\Sets\Relax
     */
    public function rules(): array
    {
        return (new Relax)->rules();
    }
}
