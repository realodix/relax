<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;
use Realodix\Relax\Rulesets\RuleSetInterface;

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

    public static function this(): self
    {
        return new self(null);
    }

    /**
     * Sets the rules for the configuration.
     */
    public function setRules(array $rules = []): ConfigInterface
    {
        $ruleSet = $this->ruleSet ? $this->ruleSet->rules() : [];

        return parent::setRules(array_merge($ruleSet, $rules));
    }
}
