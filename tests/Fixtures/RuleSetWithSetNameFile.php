<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSetWithSetNameFile extends AbstractRuleSet
{
    public function name(): string
    {
        return '@CustomRuleSetName';
    }

    public function rules(): array
    {
        return [];
    }
}
