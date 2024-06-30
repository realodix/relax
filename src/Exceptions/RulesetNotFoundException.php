<?php

namespace Realodix\Relax\Exceptions;

/**
 * @internal
 */
final class RulesetNotFoundException extends \InvalidArgumentException
{
    /**
     * Creates a new Exception instance.
     */
    public function __construct(string $ruleSetName)
    {
        parent::__construct(sprintf('Set "%s" does not exist.', $ruleSetName));
    }
}
