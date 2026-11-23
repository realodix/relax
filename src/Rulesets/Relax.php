<?php

namespace Realodix\Relax\Rulesets;

use PhpCsFixer\RuleSet\RuleSetDefinitionInterface;
use PhpCsFixerCustomFixers\Fixer;

final class Relax extends AbstractRuleSetDefinition implements RuleSetDefinitionInterface
{
    public function getDescription(): string
    {
        return 'Relax ruleset';
    }

    public function getRules(): array
    {
        return [
            '@PER-CS3x0' => true,
            'braces_position' => ['anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end'],
            'concat_space' => ['spacing' => 'none'],
            'method_argument_space' => ['on_multiline' => 'ignore'],
            'modifier_keywords' => ['elements' => ['method', 'property']],
            'new_with_parentheses' => ['named_class' => false, 'anonymous_class' => false],
            'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
            'single_trait_insert_per_statement' => false,
            'single_space_around_construct' => true,
            'no_extra_blank_lines' => [
                'tokens' => [
                    'default', 'attribute', 'case', 'continue', 'extra', 'switch', 'throw', 'use',
                    'curly_brace_block', 'parenthesis_brace_block', 'square_brace_block',
                ],
            ],

            // Extras
            'binary_operator_spaces' => [
                'default' => 'single_space',
                'operators' => ['=>' => 'at_least_single_space'],
            ],
            'class_attributes_separation' => [
                'elements' => [
                    'trait_import' => 'none',
                    // 'const' => 'none',
                    'property' => 'one',
                    'method' => 'one',
                ],
            ],
            'no_unneeded_control_parentheses' => [
                'statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield'],
            ],
            'phpdoc_align' => [
                'align' => 'left',
                'tags' => ['method', 'param', 'property', 'property-read', 'property-write', 'throws', 'type', 'var'],
            ],
            'align_multiline_comment' => true,
            'attribute_empty_parentheses' => true,
            'blank_line_before_statement' => ['statements' => ['continue', 'return']],
            'class_reference_name_casing' => true,
            'combine_consecutive_unsets' => true,
            'declare_parentheses' => true,
            'heredoc_to_nowdoc' => true,
            'increment_style' => ['style' => 'post'],
            'lambda_not_used_import' => true,
            'list_syntax' => true,
            'magic_constant_casing' => true,
            'magic_method_casing' => true,
            'method_chaining_indentation' => true,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
            'native_function_casing' => true,
            'native_type_declaration_casing' => true,
            'no_alias_functions' => true,
            'no_alias_language_construct_call' => true,
            'no_binary_string' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_phpdoc' => true,
            'no_empty_statement' => true,
            'no_mixed_echo_print' => ['use' => 'echo'],
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_short_bool_cast' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
            'no_trailing_comma_in_singleline' => true,
            'no_unneeded_braces' => true,
            'no_unneeded_import_alias' => true,
            'no_unreachable_default_argument_value' => true,
            'no_unset_cast' => true,
            'no_unused_imports' => true,
            'no_useless_concat_operator' => true,
            'no_useless_else' => true,
            'no_useless_nullsafe_operator' => true,
            'no_useless_return' => true,
            'no_whitespace_before_comma_in_array' => true,
            'nullable_type_declaration_for_default_null_value' => true,
            'object_operator_without_whitespace' => true,
            'ordered_interfaces' => true,
            'ordered_traits' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_package' => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_order' => ['order' => ['param', 'return', 'throws']],
            'phpdoc_param_order' => true,
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_trim' => true,
            'phpdoc_types_order' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
            'phpdoc_types' => true,
            'phpdoc_var_annotation_correct_order' => true,
            'simple_to_complex_string_variable' => true,
            'single_line_comment_spacing' => true,
            'single_line_comment_style' => ['comment_types' => ['hash']],
            'single_quote' => true,
            'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],
            'trim_array_spaces' => true,
            'type_declaration_spaces' => true,
            'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
            'yoda_style' => [
                'always_move_variable' => false,
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false,
            ],


            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            Fixer\NoUselessParenthesisFixer::name() => true,
            // This makes Laravel `no_superfluous_phpdoc_tags['allow_unused_params']` not work
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            Fixer\PhpdocParamTypeFixer::name() => true,
            Fixer\PhpdocSelfAccessorFixer::name() => true,
            Fixer\PhpdocTypesTrimFixer::name() => true,
        ];
    }
}
