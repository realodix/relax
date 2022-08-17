<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;
use Realodix\Relax\RuleSet\RuleSet;
use Realodix\Relax\RuleSet\RuleSetInterface;

class Config
{
    /**
     * @param string|RuleSetInterface|string[] $rules
     */
    public static function create($rules, array $localRules = []): ConfigInterface
    {
        $ruleSet = new RuleSet($rules);
        $ruleSetName = $ruleSet->getName().' ('.count($ruleSet->getRules()).' rules)';

        return (new \PhpCsFixer\Config($ruleSetName))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules(array_merge($ruleSet->getRules(), $localRules))
            ->setFinder(Finder::base());
    }
}
