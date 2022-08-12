<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSet extends AbstractRuleSet
{
    public string $name = 'RuleSetValid';

    protected function rules(): array
    {
        return [];
    }
}
