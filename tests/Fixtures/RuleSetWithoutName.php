<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSetWithoutName extends AbstractRuleSet
{
    protected function rules(): array
    {
        return [];
    }
}
