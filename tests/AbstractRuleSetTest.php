<?php

namespace Realodix\Relax\Tests;

use PHPUnit\Framework\TestCase;
use Realodix\Relax\Helper;
use Realodix\Relax\RuleSet\AbstractRuleSet;

class AbstractRuleSetTest extends TestCase
{
    private function nameCleanup($value)
    {
        return preg_replace('/\s[a-zA-Z0-9]+$/', '', $value);
    }

    public function testGetDefaultNameRules(): void
    {
        $actual = $this->nameCleanup((new DefaultName)->getName());
        $expected = '@'.Helper::classBasename(new DefaultName);

        $this->assertSame($expected, $actual);
    }

    public function testGetCustomNameRules(): void
    {
        $actual = (new CustomName)->getName();
        $expected = (new CustomName)->name;

        $this->assertSame($expected, $actual);
    }
}

final class DefaultName extends AbstractRuleSet
{
    protected function rules(): array
    {
        return [];
    }
}

final class CustomName extends AbstractRuleSet
{
    public string $name = 'Personal CS';

    protected function rules(): array
    {
        return [];
    }
}
