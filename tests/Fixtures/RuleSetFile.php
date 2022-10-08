<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSetFile extends AbstractRuleSet
{
    protected function rules(): array
    {
        return [
            ['foo' => 'bar'],
        ];
    }
}
