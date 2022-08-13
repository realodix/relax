<?php

namespace Realodix\Relax;

use PhpCsFixer\ConfigInterface;
use Realodix\Relax\RuleSet\RuleSetInterface;

class Config
{
    private static string $ruleSetNameSpace = 'Realodix\\Relax\\RuleSet\\';

    /**
     * @param string|RuleSetInterface|array<string, mixed> $rules
     */
    public static function create($rules, array $localRules = []): ConfigInterface
    {
        $ruleSetName = 'Local rules';

        // Array dicek karena `array_merge()` pada metode ini membutuhkan tipe array.
        // String|RuleSetInterface dicek karena `ruleSet()` membutuhkannya.
        if (! is_array($rules) && ! is_string($rules) && ! $rules instanceof RuleSetInterface) {
            $stack = debug_backtrace();
            throw new \InvalidArgumentException(sprintf(
                '%s() on line %s: Argument #1 must be of type %s, %s given.',
                $stack[0]['class'].$stack[0]['type'].$stack[0]['function'],
                $stack[0]['line'],
                'array|string|'.self::$ruleSetNameSpace.'RuleSetInterface',
                gettype($rules)
            ));
        }

        if (is_string($rules) || $rules instanceof RuleSetInterface) {
            $ruleSet = self::resolveSet($rules);
            $ruleSetName = $ruleSet->getName().' ('.count($ruleSet->getRules()).' rules)';
            $rules = $ruleSet->getRules();
        }

        return (new \PhpCsFixer\Config($ruleSetName))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules(array_merge($rules, $localRules))
            ->setFinder(Finder::base());
    }

    /**
     * Resolve input set into group of rules.
     *
     * @param string|RuleSetInterface $ruleSet
     */
    private static function resolveSet($ruleSet): RuleSetInterface
    {
        $nameSpace = 'Realodix\\Relax\\RuleSet\\';

        if (is_string($ruleSet)) {
            if (preg_match('/^@[A-Z]/', $ruleSet)) {
                $ruleSet = self::$ruleSetNameSpace.ltrim($ruleSet, '@');

                if (class_exists($ruleSet) && is_subclass_of($ruleSet, RuleSetInterface::class)) {
                    return new $ruleSet;
                }
            }

            $stack = debug_backtrace();

            throw new \InvalidArgumentException(sprintf(
                '%s() on line %s: Rule set "%s" does not exist.',
                // Diisi 1 karena ditunjukkan untuk `create()` (1 level di atasnya)
                $stack[1]['class'].$stack[1]['type'].$stack[1]['function'],
                $stack[1]['line'],
                ltrim($ruleSet, $nameSpace),
            ));
        }

        return $ruleSet;
    }
}
