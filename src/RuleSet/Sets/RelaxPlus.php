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
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // https://github.com/doctrine/coding-standard/blob/3e88327/lib/Doctrine/ruleset.xml#L227
                    'api', 'author', 'category', 'copyright', 'created', 'license', 'package', 'since',
                    'subpackage', 'version',
                    // https://github.com/laminas/laminas-coding-standard/blob/9825280/src/LaminasCodingStandard/ruleset.xml#L883
                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp',
                ],
            ],
            'php_unit_method_casing' => true,

            Fixer\CommentSurroundedBySpacesFixer::name() => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoUselessCommentFixer::name() => true,
        ];
    }
}
