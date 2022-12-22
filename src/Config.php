<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;
use Realodix\Relax\RuleSet\RuleSet;
use Realodix\Relax\RuleSet\RuleSetInterface;

class Config
{
    /**
     * @param array|string|RuleSetInterface $rules
     */
    public static function create($rules, array $localRules = []): ConfigInterface
    {
        $ruleSet = new RuleSet($rules);
        $numberOfRules = count($localRules) === 0 ?
            ' ('.count($ruleSet->getRules()).' rules)'
            : ' ('.count($ruleSet->getRules()).' + '.count($localRules).' rules)';
        $ruleSetName = $ruleSet->getName().$numberOfRules;

        return (new \PhpCsFixer\Config($ruleSetName))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules(array_merge($ruleSet->getRules(), $localRules))
            ->setFinder(Finder::base());
    }
}
