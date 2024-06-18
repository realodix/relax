<?php

namespace Realodix\Relax\RuleSet;

final class RuleSet
{
    /**
     * @var array|string|RuleSetInterface
     */
    private $ruleSet;

    /**
     * @param array|string|RuleSetInterface $ruleSet
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($ruleSet)
    {
        if (! is_array($ruleSet) && ! is_string($ruleSet) && ! $ruleSet instanceof RuleSetInterface) {
            throw new \InvalidArgumentException(sprintf(
                'The rule set must be of type %s, %s given.',
                'array|string|Realodix\\Relax\\RuleSet\\RuleSetInterface',
                gettype($ruleSet)
            ));
        }

        $this->ruleSet = $ruleSet;
    }

    public function getName(): string
    {
        $ruleSet = $this->getSetDefinitions($this->ruleSet);
        if (is_object($ruleSet)) {
            return $ruleSet->name();
        }

        return 'Local rules';
    }

    public function getRules(): array
    {
        $ruleSet = $this->getSetDefinitions($this->ruleSet);
        if (is_object($ruleSet)) {
            return $ruleSet->rules();
        }

        return $ruleSet;
    }

    /**
     * Resolve input set into group of rules.
     *
     * @param array|string|RuleSetInterface $ruleSet
     * @return array|RuleSetInterface
     *
     * @throws \InvalidArgumentException
     */
    private function getSetDefinitions($ruleSet)
    {
        $ruleSetNameSpace = 'Realodix\\Relax\\RuleSet\\Sets\\';

        if (is_string($ruleSet)) {
            if (preg_match('/^@[A-Z]/', $ruleSet)) {
                $relaxRuleSet = $ruleSetNameSpace.ltrim($ruleSet, '@');
                if (class_exists($relaxRuleSet) && is_subclass_of($relaxRuleSet, RuleSetInterface::class)) {
                    return new $relaxRuleSet;
                }

            }

            throw new \InvalidArgumentException(sprintf('Set "%s" does not exist.', $ruleSet));
        }

        return $ruleSet;
    }
}
