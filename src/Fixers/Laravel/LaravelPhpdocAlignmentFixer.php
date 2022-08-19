<?php

namespace Realodix\Relax\Fixers\Laravel;

use PhpCsFixer\DocBlock\TypeExpression;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * Latest commit 8a99239 on Jul 4, 2022
 * https://github.com/laravel/pint/blob/main/app/Fixers/LaravelPhpdocAlignmentFixer.php
 * The MIT License (MIT), Copyright (c) Taylor Otwell
 *
 * Some code in this file is part of PHP CS Fixer and licensed under MIT license.
 * Copyright (c) 2012-2022 Fabien Potencier, Dariusz Rumiński
 */
class LaravelPhpdocAlignmentFixer implements FixerInterface
{
    public function getName(): string
    {
        return 'Laravel/laravel_phpdoc_alignment';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            '@param and type definition must be followed by two spaces.',
            []
        );
    }

    public function getPriority(): int
    {
        return -42;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([T_DOC_COMMENT]);
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        for ($index = $tokens->count() - 1; $index > 0; $index--) {
            if (! $tokens[$index]->isGivenKind([\T_DOC_COMMENT])) {
                continue;
            }

            $newContent = preg_replace_callback(
                '/(?P<tag>@param)\s+(?P<hint>(?:'.TypeExpression::REGEX_TYPES.')?)\s+(?P<var>(?:&|\.{3})?\$\S+)/ux',
                fn ($matches) => $matches['tag'].'  '.$matches['hint'].'  '.$matches['var'],
                $tokens[$index]->getContent()
            );

            if ($newContent == $tokens[$index]->getContent()) {
                continue;
            }

            $tokens[$index] = new Token([T_DOC_COMMENT, $newContent]);
        }
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }
}
