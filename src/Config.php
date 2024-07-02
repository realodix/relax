<?php

namespace Realodix\Relax;

use PhpCsFixer\Config as PhpCsFixerConfig;
use PhpCsFixer\ConfigInterface;
use Realodix\Relax\Exceptions\RulesetNotFoundException;
use Realodix\Relax\RuleSet\RuleSetInterface;

class Config extends PhpCsFixerConfig
{
    const LOCAL_RULES_NAME = 'Local Rules';

    private ?RuleSetInterface $ruleSet;

    public function __construct(?RuleSetInterface $ruleSet)
    {
        $this->ruleSet = $ruleSet;
        $name = $this->ruleSet ? $this->ruleSet->name() : self::LOCAL_RULES_NAME;

        parent::__construct($name);
        $this->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers);
        $this->setFinder(Finder::base());
        $this->setRiskyAllowed(true);
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
     * @param null|RuleSetInterface|string $ruleSet The ruleset to use.
     * @return self
     *
     * @throws \InvalidArgumentException
     * @throws RulesetNotFoundException  If the rule set does not exist.
     */
    public static function create($ruleSet = null)
    {
        if (! ($ruleSet instanceof RuleSetInterface) && ! is_string($ruleSet) && $ruleSet !== null) {
            throw new \InvalidArgumentException(
                'Ruleset must be of type Relax RuleSetInterface, a string or null'
            );
        }

        if (is_string($ruleSet)) {
            $relaxRuleset = 'Realodix\\Relax\\RuleSet\\Sets\\'.ucfirst($ruleSet);

            if (! class_exists($relaxRuleset)) {
                throw new RulesetNotFoundException($ruleSet);
            }

            /** @var RuleSetInterface */
            $ruleSet = new $relaxRuleset;
        }

        return new self($ruleSet);
    }
}
