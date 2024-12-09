<?php

namespace Realodix\Relax\RuleSet\Sets;

use PhpCsFixerCustomFixers\Fixer;
use Realodix\Relax\RuleSet\AbstractRuleSet;

final class Relax extends AbstractRuleSet
{
    /**
     * Inherit the rules from Laravel
     *
     * @see \Realodix\Relax\RuleSet\Sets\Laravel
     */
    public function rules(): array
    {
        return array_merge((new Laravel)->rules(), $this->mainRules());
    }

    /**
     * Returns the main rules
     *
     * @internal
     */
    public function mainRules(): array
    {
        return [
            'align_multiline_comment' => true,
            'attribute_empty_parentheses' => true,
            'class_reference_name_casing' => true,
            'combine_consecutive_unsets' => true,
            'no_break_comment' => true,
            'no_unneeded_import_alias' => true,
            'no_useless_concat_operator' => true,
            'no_useless_else' => true,
            'no_useless_nullsafe_operator' => true,
            'operator_linebreak' => ['only_booleans' => true],
            'ordered_class_elements' => ['order' => ['use_trait']],
            'ordered_types' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
            'phpdoc_param_order' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types_order' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
            'phpdoc_var_annotation_correct_order' => true,
            'simple_to_complex_string_variable' => true,

            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            Fixer\NoUselessParenthesisFixer::name() => true,
            // This makes Laravel `no_superfluous_phpdoc_tags['allow_unused_params']` not work
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            Fixer\PhpdocParamTypeFixer::name() => true,
            Fixer\PhpdocSelfAccessorFixer::name() => true,
            Fixer\PhpdocTypesTrimFixer::name() => true,

            /*
             * Laravel rules adjustment
             */
            'not_operator_with_successor_space' => false,
            'php_unit_method_casing' => false,
            'php_unit_set_up_tear_down_visibility' => false,
            'phpdoc_tag_type' => false,
            'binary_operator_spaces' => [
                'default' => 'single_space',
                'operators' => ['=>' => 'at_least_single_space'],
            ],
            'concat_space' => ['spacing' => 'one'],
            'class_attributes_separation' => [
                'elements' => [
                    'trait_import' => 'none',
                    'const' => 'none',
                    'property' => 'one',
                    'method' => 'one',
                ],
            ],
            'class_definition' => ['inline_constructor_arguments' => false, 'space_before_parenthesis' => true],
            'braces_position' => ['anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end'],
            'function_declaration' => ['closure_fn_spacing' => 'none'],
            'method_argument_space' => ['on_multiline' => 'ignore'],
            'no_extra_blank_lines' => [
                'tokens' => [
                    'default', 'attribute', 'case', 'continue', 'extra', 'switch', 'throw', 'use',
                    'curly_brace_block', 'parenthesis_brace_block', 'square_brace_block',
                ],
            ],
            'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
            'single_import_per_statement' => ['group_to_single_imports' => false],
            'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],
            'trailing_comma_in_multiline' => ['elements' => ['arguments', 'array_destructuring', 'arrays', 'match', 'parameters']],
            'unary_operator_spaces' => ['only_dec_inc' => true],
            'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
            'phpdoc_align' => [
                'align' => 'left',
                'tags' => ['method', 'param', 'property', 'property-read', 'property-write', 'throws', 'type', 'var'],
            ],
            'phpdoc_separation' => [
                'groups' => [
                    ['param', 'param-out', 'return'], ['var', 'readonly'],
                    ['property', 'property-read', 'property-write', 'method'],
                    ['template', 'extends', 'implements', 'template-extends', 'template-implements', 'template-covariant', 'template-use'],
                    [
                        'author', 'copyright', 'license', 'category', 'package', 'subpackage', 'deprecated', 'since',
                        'link', 'see',
                    ],
                    // https://github.com/sebastianbergmann/phpunit-documentation-english/blob/main/src/annotations.rst
                    ['test', 'testWith', 'dataProvider', 'covers', 'group', 'uses'], ['runInSeparateProcess', 'preserveGlobalState'],
                    ['runTestsInSeparateProcesses', 'runClassInSeparateProcess'],
                    // https://psalm.dev/docs/annotating_code/supported_annotations/
                    ['psalm-template', 'psalm-import-type', 'psalm-property', 'psalm-property-read', 'psalm-property-write',
                        'psalm-param', 'psalm-return', 'psalm-type', 'psalm-suppress', 'psalm-pure', 'psalm-param-out',
                        'psalm-assert', 'psalm-assert-if-true', 'psalm-assert-if-false', 'psalm-if-this-is', 'psalm-this-out',
                    ],
                    // https://phpstan.org/writing-php-code/phpdocs-basics
                    ['phpstan-template', 'phpstan-import-type', 'phpstan-property', 'phpstan-property-read', 'phpstan-property-write',
                        'phpstan-param', 'phpstan-return', 'phpstan-type', 'phpstan-pure', 'phpstan-impure',
                        'phpstan-assert', 'phpstan-assert-if-true', 'phpstan-assert-if-false', 'phpstan-self-out', 'phpstan-this-out',
                    ],
                ],
            ],
        ];
    }
}
