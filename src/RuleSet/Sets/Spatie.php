<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;

/**
 * Latest commit a4554e3 on Sep 7, 2021
 * https://github.com/spatie/spatie.be/blob/main/.php-cs-fixer.php
 *
 * @codeCoverageIgnore
 */
final class Spatie extends AbstractRuleSet
{
    public function rules(): array
    {
        return [
            '@PSR12' => true,
            'array_syntax' => ['syntax' => 'short'],
            'ordered_imports' => ['sort_algorithm' => 'alpha'],
            'no_unused_imports' => true,
            'not_operator_with_successor_space' => true,
            'trailing_comma_in_multiline' => true,
            'phpdoc_scalar' => true,
            'unary_operator_spaces' => true,
            'binary_operator_spaces' => true,
            'blank_line_before_statement' => [
                'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
            ],
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_var_without_name' => true,
            'class_attributes_separation' => [
                'elements' => [
                    'method' => 'one',
                ],
            ],
            'method_argument_space' => [
                'on_multiline' => 'ensure_fully_multiline',
                'keep_multiple_spaces_after_comma' => true,
            ],
            'single_trait_insert_per_statement' => true,
        ];
    }
}
