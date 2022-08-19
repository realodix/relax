<?php

namespace Realodix\Relax\Fixers\Laravel;

use PhpCsFixer\DocBlock\Annotation;
use PhpCsFixer\DocBlock\DocBlock;
use PhpCsFixer\DocBlock\Tag;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * Latest commit 8a99239 on Jul 4, 2022
 * https://github.com/laravel/pint/blob/main/app/Fixers/LaravelPhpdocSeparationFixer.php
 * The MIT License (MIT), Copyright (c) Taylor Otwell
 *
 * Some code in this file is part of PHP CS Fixer and licensed under MIT license.
 * Copyright (c) 2012-2022 Fabien Potencier, Dariusz Rumiński
 */
final class LaravelPhpdocSeparationFixer implements FixerInterface
{
    /**
     * Groups of tags that should be allowed to immediately follow each other.
     *
     * @var array<int, array<int, string>>
     */
    protected $groups = [
        ['deprecated', 'link', 'see', 'since'],
        ['author', 'copyright', 'license'],
        ['category', 'package', 'subpackage'],
        ['property', 'property-read', 'property-write'],
        ['param', 'return'],
    ];

    public function getName(): string
    {
        return 'Laravel/laravel_phpdoc_separation';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'Annotations should be grouped together.',
            []
        );
    }

    public function getPriority(): int
    {
        return -3;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isTokenKindFound(T_DOC_COMMENT);
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        foreach ($tokens as $index => $token) {
            if (! $token->isGivenKind(T_DOC_COMMENT)) {
                continue;
            }

            $doc = new DocBlock($token->getContent());
            $this->fixDescription($doc);
            $this->fixAnnotations($doc);

            $tokens[$index] = new Token([T_DOC_COMMENT, $doc->getContent()]);
        }
    }

    /**
     * Make sure the description is separated from the annotations.
     */
    protected function fixDescription(DocBlock $doc): void
    {
        foreach ($doc->getLines() as $index => $line) {
            if ($line->containsATag()) {
                break;
            }

            if ($line->containsUsefulContent()) {
                $next = $doc->getLine($index + 1);

                if (null !== $next && $next->containsATag()) {
                    $line->addBlank();

                    break;
                }
            }
        }
    }

    /**
     * Make sure the annotations are correctly separated.
     */
    protected function fixAnnotations(DocBlock $doc): void
    {
        foreach ($doc->getAnnotations() as $index => $annotation) {
            $next = $doc->getAnnotation($index + 1);

            if (null === $next) {
                break;
            }

            if (true === $next->getTag()->valid()) {
                if ($this->shouldBeTogether($annotation->getTag(), $next->getTag())) {
                    $this->ensureAreTogether($doc, $annotation, $next);
                } else {
                    $this->ensureAreSeparate($doc, $annotation, $next);
                }
            }
        }
    }

    /**
     * Ensure the given annotations to immediately follow each other.
     */
    protected function ensureAreTogether(DocBlock $doc, Annotation $first, Annotation $second): void
    {
        $pos = $first->getEnd();
        $final = $second->getStart();

        for ($pos = $pos + 1; $pos < $final; $pos++) {
            $doc->getLine($pos)->remove();
        }
    }

    /**
     * Ensure the given annotations to have one empty line between each other.
     */
    protected function ensureAreSeparate(DocBlock $doc, Annotation $first, Annotation $second): void
    {
        $pos = $first->getEnd();
        $final = $second->getStart() - 1;

        // check if we need to add a line, or need to remove one or more lines
        if ($pos === $final) {
            $doc->getLine($pos)->addBlank();

            return;
        }

        for ($pos = $pos + 1; $pos < $final; $pos++) {
            $doc->getLine($pos)->remove();
        }
    }

    /**
     * If the given tags should be together or apart.
     */
    protected function shouldBeTogether(Tag $first, Tag $second): bool
    {
        $firstName = $first->getName();
        $secondName = $second->getName();

        if ($firstName === $secondName) {
            return true;
        }

        foreach ($this->groups as $group) {
            if (\in_array($firstName, $group, true) && \in_array($secondName, $group, true)) {
                return true;
            }
        }

        return false;
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }
}
