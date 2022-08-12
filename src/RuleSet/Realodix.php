<?php

namespace Realodix\Relax\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

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
            'Laravel/laravel_phpdoc_alignment' => false,
            'Laravel/laravel_phpdoc_order' => false,
            'Laravel/laravel_phpdoc_separation' => false,
            'curly_braces_position' => [
                'anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            ],
            'method_argument_space' => ['on_multiline' => 'ignore', 'after_heredoc' => true],

            /*
             * Addition
             */
            'blank_line_between_import_groups' => true,
            'class_reference_name_casing' => true,
            'combine_consecutive_unsets' => true,
            'new_with_braces' => ['named_class' => false, 'anonymous_class' => false],
            'no_empty_comment' => true,
            'no_superfluous_phpdoc_tags' => ['allow_mixed' => true, 'allow_unused_params' => true],
            'no_trailing_comma_in_singleline_function_call' => true,
            'no_unneeded_import_alias' => true,
            'no_useless_else' => true,
            'no_useless_nullsafe_operator' => true,
            'php_unit_method_casing' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_var_annotation_correct_order' => true,
            'simple_to_complex_string_variable' => true,
            'single_line_comment_spacing' => true,

            // Relates to changes to `Laravel/laravel_` rules
            'phpdoc_align' => [
                // align_phpdoc
                'tags' => [
                    'param',
                    'throws', 'type', 'var',
                    'return',
                ],
            ],
            'phpdoc_separation' => true,
            'phpdoc_order' => true,

            Fixer\CommentSurroundedBySpacesFixer::name() => true,
            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoDuplicatedArrayKeyFixer::name() => true,
            Fixer\NoDuplicatedImportsFixer::name() => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name() => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
            Fixer\NoUselessParenthesisFixer::name() => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name() => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            Fixer\PhpdocParamOrderFixer::name() => true,
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
