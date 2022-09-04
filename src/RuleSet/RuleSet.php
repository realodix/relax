<?php

namespace Realodix\Relax\RuleSet;

use PhpCsFixer\RuleSet\RuleSetDescriptionInterface;

final class RuleSet
{
    private static string $ruleSetNameSpace = 'Realodix\\Relax\\RuleSet\\Sets\\';

    /**
     * @var array|string|object
     */
    private $set;

    /**
     * @param array|string|RuleSetInterface $set
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($set)
    {
        if (! is_array($set) && ! is_string($set) && ! $set instanceof RuleSetInterface) {
            throw new \InvalidArgumentException(sprintf(
                'The rule set must be of type %s, %s given.',
                'array|string|'.self::$ruleSetNameSpace.'RuleSetInterface',
                gettype($set)
            ));
        }

        $this->set = $this->getSetDefinitions($set);
    }

    public function getName(): string
    {
        if (is_object($this->set)) {
            return $this->set->getName();
        }

        return 'Local rules';
    }

    public function getRules(): array
    {
        if (is_object($this->set)) {
            return $this->set->getRules();
        }

        return $this->set;
    }

    /**
     * Resolve input set into group of rules.
     *
     * - Relax: RuleSetInterface
     * - PhpCsFixer: RuleSetDescriptionInterface
     *
     * @param  array|string|RuleSetInterface                      $ruleSet
     * @return array|RuleSetInterface|RuleSetDescriptionInterface
     *
     * @throws \InvalidArgumentException
     */
    private function getSetDefinitions($ruleSet)
    {
        if (is_string($ruleSet)) {
            if (preg_match('/^@[A-Z]/', $ruleSet)) {
                $localRuleSet = self::$ruleSetNameSpace.ltrim($ruleSet, '@');

                if (is_subclass_of($localRuleSet, RuleSetInterface::class)) {
                    return new $localRuleSet;
                }

                $pcfNameSpace = 'PhpCsFixer\\RuleSet\\Sets\\';
                $pcfRuleSet = $pcfNameSpace.ltrim(str_replace(':risky', 'Risky', $ruleSet), '@').'Set';

                if (is_subclass_of($pcfRuleSet, RuleSetDescriptionInterface::class)) {
                    return new $pcfRuleSet;
                }
            }

            throw new \InvalidArgumentException(sprintf('Set "%s" does not exist.', $ruleSet));
        }

        return $ruleSet;
    }
}
