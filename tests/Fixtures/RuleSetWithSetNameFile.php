<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSetWithSetNameFile extends AbstractRuleSet
{
    public string $name = 'valid-rule-set';

    public function rules(): array
    {
        return [];
    }
}
