<?php

namespace Realodix\Relax\RuleSet\Sets;

use PhpCsFixerCustomFixers\Fixer;
use Realodix\Relax\RuleSet\AbstractRuleSet;

final class Realodix extends AbstractRuleSet
{
    protected function rules(): array
    {
        $baseRules = (new Laravel)->rules();

        $rules = [
            /*
             * Modify
             */
            'phpdoc_summary' => false,
            'ternary_operator_spaces' => false,
            'unary_operator_spaces' => false,
            'curly_braces_position' => [
                'anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            ],
            'method_argument_space' => ['on_multiline' => 'ignore', 'after_heredoc' => true],
            'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
            // Laravel/laravel_
            'Laravel/laravel_phpdoc_alignment' => false,
            'phpdoc_align' => ['tags' => ['method', 'param', 'property', 'throws', 'type', 'var']],
            'phpdoc_separation' => [
                'groups' => [
                    ['param', 'param-out', 'return'], ['var', 'readonly'],
                    ['template', 'extends', 'implements', 'template-extends', 'template-implements', 'template-covariant', 'template-use'],
                    // https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/phpdoc/phpdoc_separation.rst
                    // Dengan perubahan `deprecated` & `since` digabungkan ke kolompok `package`.
                    ['category', 'package', 'subpackage', 'deprecated', 'since'], ['link', 'see'],
                    // Add 'method' to 'property'
                    ['method', 'property', 'property-read', 'property-write'], ['author', 'copyright', 'license'],
                    // https://phpunit.readthedocs.io/en/9.5/annotations.html
                    ['test', 'testWith', 'dataProvider', 'covers', 'group', 'uses'], ['runInSeparateProcess', 'preserveGlobalState'],
                    ['runTestsInSeparateProcesses', 'runClassInSeparateProcess'],
                    // https://psalm.dev/docs/annotating_code/supported_annotations/
                    ['psalm-param', 'psalm-return', 'psalm-suppress', 'psalm-pure', 'psalm-param-out', 'psalm-template',
                        'psalm-assert', 'psalm-assert-if-true', 'psalm-assert-if-false', 'psalm-if-this-is', 'psalm-this-out',
                        'psalm-property', 'psalm-property-read', 'psalm-property-write',
                    ],
                    // PHPSatan
                    ['phpstan-param', 'phpstan-return', 'phpstan-pure', 'phpstan-template', 'phpstan-type', 'phpstan-import-type',
                        'phpstan-assert', 'phpstan-assert-if-true', 'phpstan-assert-if-false',
                        'phpstan-property', 'phpstan-property-read', 'phpstan-property-write',
                    ],
                ],
            ],

            /*
             * Addition
             */
            'align_multiline_comment' => true,
            'class_reference_name_casing' => true,
            'combine_consecutive_unsets' => true,
            'new_with_braces' => ['named_class' => false, 'anonymous_class' => false],
            'no_empty_comment' => true,
            'no_unneeded_import_alias' => true,
            'no_useless_concat_operator' => true,
            'no_useless_else' => true,
            'no_useless_nullsafe_operator' => true,
            'operator_linebreak' => [
                'only_booleans' => true,
            ],
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_var_annotation_correct_order' => true,
            'simple_to_complex_string_variable' => true,
            'single_line_comment_spacing' => true,

            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\MultilinePromotedPropertiesFixer::name() => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoDuplicatedArrayKeyFixer::name() => true,
            Fixer\NoDuplicatedImportsFixer::name() => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
            Fixer\NoUselessParenthesisFixer::name() => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            Fixer\PhpdocParamTypeFixer::name() => true,
            Fixer\PhpdocSelfAccessorFixer::name() => true,
            Fixer\PhpdocTypesCommaSpacesFixer::name() => true,
            Fixer\PhpdocTypesTrimFixer::name() => true,
            Fixer\SingleSpaceAfterStatementFixer::name() => ['allow_linebreak' => true],
            Fixer\SingleSpaceBeforeStatementFixer::name() => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
