<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;

class Config extends \PhpCsFixer\Config
{
    public function __construct(?string $name)
    {
        if ($name === null) {
            parent::__construct();
        } else {
            parent::__construct($name);
        }

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

    public static function this(?string $name = null): self
    {
        return new self($name);
    }

    /**
     * Sets the rules for the configuration.
     */
    public function setRules(array $rules = []): ConfigInterface
    {
        return parent::setRules($rules);
    }
}
