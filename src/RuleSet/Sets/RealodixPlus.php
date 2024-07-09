<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;

/**
 * @deprecated use `RelaxPlus` instead
 */
final class RealodixPlus extends AbstractRuleSet
{
    /**
     * Inherit the rules from Realodix
     *
     * @see \Realodix\Relax\RuleSet\Sets\RelaxPlus
     */
    public function rules(): array
    {
        return (new RelaxPlus)->rules();
    }
}
