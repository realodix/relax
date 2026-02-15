<?php

namespace Realodix\Relax\Rulesets;

use PhpCsFixer\RuleSet\RuleSetDefinitionInterface;
use PhpCsFixerCustomFixers\Fixer;

final class RelaxPlus extends AbstractRuleSetDefinition implements RuleSetDefinitionInterface
{
    public function getDescription(): string
    {
        return 'RelaxPlus ruleset';
    }

    public function getRules(): array
    {
        return [
            '@Realodix/Relax' => true,
            // Migration
            'assign_null_coalescing_to_coalesce_equal' => true,
            'explicit_string_variable' => true,
            'multiline_comment_opening_closing' => true,
            'php_unit_fqcn_annotation' => true,
            'ternary_to_null_coalescing' => true,

            // Control Structure
            'class_definition' => ['single_line' => true, 'space_before_parenthesis' => true],
            'no_superfluous_elseif' => true,
            'ordered_class_elements' => [
                'order' => [
                    'use_trait', 'case', 'constant', 'property',
                    'construct', 'destruct', 'magic',
                ],
            ],

            // Cleanup
            'phpdoc_no_alias_tag' => ['replacements' => ['type' => 'var', 'link' => 'see']],
            'phpdoc_to_comment' => ['ignored_tags' => ['var']],
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

    public function isRisky(): bool
    {
        return false;
    }
}
