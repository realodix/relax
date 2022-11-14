<?php

namespace Realodix\Relax\RuleSet\Sets;

use PhpCsFixerCustomFixers\Fixer;
use Realodix\Relax\RuleSet\AbstractRuleSet;

/**
 * Inherits Realodix preset
 *
 * @see Realodix\Relax\RuleSet\Realodix
 */
final class RealodixPlus extends AbstractRuleSet
{
    protected function rules(): array
    {
        $baseRules = (new Realodix)->rules();

        $rules = [
            'explicit_string_variable' => true,
            'no_superfluous_elseif' => true,
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // https://github.com/doctrine/coding-standard/blob/f86c16aedb/lib/Doctrine/Rules.xml#L192
                    'api', 'author', 'category', 'copyright', 'created', 'license', 'package', 'since',
                    'subpackage', 'version',
                    // https://github.com/laminas/laminas-coding-standard/blob/22068e0b91/src/LaminasCodingStandard/Rules.xml#L883
                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp',
                ],
            ],
            'php_unit_method_casing' => true,

            Fixer\CommentSurroundedBySpacesFixer::name() => true,
            Fixer\NoUselessCommentFixer::name() => true,
            Fixer\PhpdocParamOrderFixer::name() => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
