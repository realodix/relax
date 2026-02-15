<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;
use Realodix\Relax\Rulesets\RelaxPlus as RelaxPlusSet;

/**
 * @deprecated
 */
final class RelaxPlus extends AbstractRuleSet
{
    public function rules(): array
    {
        return (new RelaxPlusSet)->getRules();
    }
}
