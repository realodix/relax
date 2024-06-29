<?php

namespace Realodix\Relax;

use PhpCsFixer\Config as PhpCsFixerConfig;
use PhpCsFixer\ConfigInterface;
use Realodix\Relax\RuleSet\RuleSetInterface;
use Realodix\Relax\RuleSet\Sets\Realodix;

class Config extends PhpCsFixerConfig
{
    private RuleSetInterface $ruleSet;

    public function __construct(?RuleSetInterface $preset = null)
    {
        $this->ruleSet = $preset ?: new Realodix;

        parent::__construct($this->ruleSet->name());

        $this->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers);
        $this->setFinder(Finder::base());
        $this->setRiskyAllowed(true);
    }

    public function setRules(array $rules = []): ConfigInterface
    {
        return parent::setRules(array_merge($this->ruleSet->rules(), $rules));
    }

    /**
     * @return self
     */
    public static function create(?RuleSetInterface $ruleSet = null)
    {
        return new self($ruleSet);
    }
}
