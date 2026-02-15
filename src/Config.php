<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;
use Realodix\Relax\Exceptions\RulesetNotFoundException;
use Realodix\Relax\RuleSet\RuleSetInterface;

class Config extends \PhpCsFixer\Config
{
    const LOCAL_RULES_NAME = 'Local Rules';

    private ?RuleSetInterface $ruleSet;

    public function __construct(?RuleSetInterface $ruleSet)
    {
        $this->ruleSet = $ruleSet;
        $name = $this->ruleSet ? $this->ruleSet->name() : self::LOCAL_RULES_NAME;

        parent::__construct($name);
        $this
            ->setFinder(Finder::base()->in(getcwd()))
            ->setRiskyAllowed(true)
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomRuleSets([
                new \Realodix\Relax\Rulesets\Laravel,
                new \Realodix\Relax\Rulesets\Relax,
                new \Realodix\Relax\Rulesets\RelaxPlus,
            ])
            ->setRules();
    }

    /**
     * Sets the rules for the configuration.
     */
    public function setRules(array $rules = []): ConfigInterface
    {
        $ruleSet = $this->ruleSet ? $this->ruleSet->rules() : [];

        return parent::setRules(array_merge($ruleSet, $rules));
    }

    /**
     * Create a new config.
     *
     * @param RuleSetInterface|string|null $ruleSet The ruleset to use.
     * @return self
     *
     * @throws \InvalidArgumentException
     * @throws RulesetNotFoundException If the rule set does not exist.
     */
    public static function create($ruleSet = null)
    {
        if (!$ruleSet instanceof RuleSetInterface && !is_string($ruleSet) && $ruleSet !== null) {
            throw new \InvalidArgumentException(
                'Ruleset must be of type Relax RuleSetInterface, string or null',
            );
        }

        // If the rule set is a string, we try to find it in the RuleSet namespace
        if (is_string($ruleSet)) {
            $relaxRuleset = 'Realodix\Relax\RuleSet\Sets\\'.ucfirst($ruleSet);

            if (!class_exists($relaxRuleset)) {
                throw new RulesetNotFoundException($ruleSet);
            }

            /** @var RuleSetInterface */
            $ruleSet = new $relaxRuleset;
        }

        return new self($ruleSet);
    }
}
