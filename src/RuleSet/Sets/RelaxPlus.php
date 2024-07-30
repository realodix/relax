<?php

namespace Realodix\Relax\RuleSet\Sets;

use PhpCsFixerCustomFixers\Fixer;
use Realodix\Relax\RuleSet\AbstractRuleSet;

final class RelaxPlus extends AbstractRuleSet
{
    /**
     * Inherit the rules from Relax
     *
     * @see \Realodix\Relax\RuleSet\Sets\Relax
     */
    public function rules(): array
    {
        return array_merge((new Relax)->rules(), $this->mainRules());
    }

    /**
     * Returns the main rules
     *
     * @internal
     */
    public function mainRules(): array
    {
        return [
            'explicit_string_variable' => true,
            'no_superfluous_elseif' => true,
            'numeric_literal_separator' => ['override_existing' => true],
            'php_unit_fqcn_annotation' => true,
            'string_implicit_backslashes' => true,
            'ternary_to_null_coalescing' => true,
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // https://github.com/doctrine/coding-standard/blob/3e88327/lib/Doctrine/ruleset.xml#L227
                    'api', 'author', 'category', 'copyright', 'created', 'license', 'package', 'since',
                    'subpackage', 'version',
                    // https://github.com/laminas/laminas-coding-standard/blob/2ddabf7/src/LaminasCodingStandard/ruleset.xml#L885
                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage',
                    'expectedExceptionMessageRegExp',
                ],
            ],

            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
        ];
    }
}
