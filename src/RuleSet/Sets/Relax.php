<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;
use Realodix\Relax\Rulesets\Relax as RelaxSet;

/**
 * @deprecated
 */
final class Relax extends AbstractRuleSet
{
    public function rules(): array
    {
        return (new RelaxSet)->getRules();
    }
}
