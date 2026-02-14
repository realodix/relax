<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;
use Realodix\Relax\Rulesets\Laravel as LaravelSet;

/**
 * @deprecated
 */
final class Laravel extends AbstractRuleSet
{
    public function rules(): array
    {
        return (new LaravelSet)->getRules();
    }
}
