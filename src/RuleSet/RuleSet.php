<?php

namespace Realodix\Relax\RuleSet;

use PhpCsFixer\RuleSet\RuleSetDescriptionInterface as PhpCsFixerRuleSetInterface;
use Realodix\Relax\RuleSet\RuleSetInterface as RelaxRuleSetInterface;

final class RuleSet
{
    private static string $ruleSetNameSpace = 'Realodix\\Relax\\RuleSet\\Sets\\';

    /**
     * @var array|string|RelaxRuleSetInterface|PhpCsFixerRuleSetInterface
     */
    private $ruleSet;

    /**
     * @param array|string|RelaxRuleSetInterface $ruleSet
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($ruleSet)
    {
        if (! is_array($ruleSet) && ! is_string($ruleSet) && ! $ruleSet instanceof RelaxRuleSetInterface) {
            throw new \InvalidArgumentException(sprintf(
                'The rule set must be of type %s, %s given.',
                'array|string|'.self::$ruleSetNameSpace.'RuleSetInterface',
                gettype($ruleSet)
            ));
        }

        $this->ruleSet = $ruleSet;
    }

    public function getName(): string
    {
        $ruleSet = $this->getSetDefinitions($this->ruleSet);
        if (is_object($ruleSet)) {
            return $ruleSet->getName();
        }

        return 'Local rules';
    }

    public function getRules(): array
    {
        $ruleSet = $this->getSetDefinitions($this->ruleSet);
        if (is_object($ruleSet)) {
            return $ruleSet->getRules();
        }

        return $ruleSet;
    }

    /**
     * Resolve input set into group of rules.
     *
     * @param array|string|RelaxRuleSetInterface|PhpCsFixerRuleSetInterface $ruleSet
     * @return array|RelaxRuleSetInterface|PhpCsFixerRuleSetInterface
     *
     * @throws \InvalidArgumentException
     */
    private function getSetDefinitions($ruleSet)
    {
        if (is_string($ruleSet)) {
            if (preg_match('/^@[A-Z]/', $ruleSet)) {
                $relaxRuleSet = self::$ruleSetNameSpace.ltrim($ruleSet, '@');
                if (class_exists($relaxRuleSet) && is_subclass_of($relaxRuleSet, RelaxRuleSetInterface::class)) {
                    return new $relaxRuleSet;
                }

                $pcfRuleSetClassName = ltrim(str_replace(':risky', 'Risky', $ruleSet), '@').'Set';
                $pcfRuleSet = 'PhpCsFixer\\RuleSet\\Sets\\'.$pcfRuleSetClassName;
                if (class_exists($pcfRuleSet) && is_subclass_of($pcfRuleSet, PhpCsFixerRuleSetInterface::class)) {
                    return new $pcfRuleSet;
                }
            }

            throw new \InvalidArgumentException(sprintf('Set "%s" does not exist.', $ruleSet));
        }

        return $ruleSet;
    }
}
