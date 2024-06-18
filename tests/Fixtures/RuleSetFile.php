<?php

namespace Realodix\Relax\Tests\Fixtures;

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RuleSetFile extends AbstractRuleSet
{
    public function rules(): array
    {
        return [
            ['foo' => 'bar'],
        ];
    }
}
