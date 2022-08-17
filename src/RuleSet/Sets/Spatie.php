<?php

namespace Realodix\Relax\RuleSet\Sets;

use Realodix\Relax\RuleSet\AbstractRuleSet;

/**
 * Latest commit a312900 on Nov 15, 2021
 * https://github.com/spatie/temporary-directory/blob/main/.php-cs-fixer.dist.php
 *
 * @codeCoverageIgnore
 */
final class Spatie extends AbstractRuleSet
{
    protected function rules(): array
    {
        return [
            '@PSR12' => true,
            'array_syntax' => ['syntax' => 'short'],
            'binary_operator_spaces' => true,
            'blank_line_before_statement' => ['statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try']],
            'class_attributes_separation' => ['elements' => ['method' => 'one']],
            'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline', 'keep_multiple_spaces_after_comma' => true],
            'no_unused_imports' => true,
            'not_operator_with_successor_space' => true,
            'ordered_imports' => ['sort_algorithm' => 'alpha'],
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_var_without_name' => true,
            'single_trait_insert_per_statement' => true,
            'trailing_comma_in_multiline' => true,
            'unary_operator_spaces' => true,
        ];
    }
}
