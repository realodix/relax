<?php

namespace Realodix\Relax;

use PhpCsFixer\Config as PhpCsFixerConfig;
use PhpCsFixer\ConfigInterface;
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
     * Create a new config
     *
     * @return self
     */
    public static function create(RuleSetInterface|string|null $ruleSet = null)
    {
        if (is_string($ruleSet)) {
            $relaxRuleset = 'Realodix\\Relax\\RuleSet\\Sets\\'.$ruleSet;

            $ruleSet = new $relaxRuleset;
        }

        return new self($ruleSet);
    }
}
