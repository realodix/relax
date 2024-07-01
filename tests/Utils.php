<?php

namespace Realodix\Relax\Tests;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerFactory;

class Utils
{
    public static function ruleSets(): array
    {
        return [
            new \Realodix\Relax\RuleSet\Sets\Laravel,
            new \Realodix\Relax\RuleSet\Sets\Realodix,
            new \Realodix\Relax\RuleSet\Sets\RealodixPlus,
            new \Realodix\Relax\RuleSet\Sets\Spatie,
        ];
    }

    public static function fixerFactory(): FixerFactory
    {
        $factory = new FixerFactory;
        $factory->registerBuiltInFixers();
        $factory->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers);

        return $factory;
    }

    /**
     * https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/f391652/tests/Test/TestCaseUtils.php#L45
     */
    public static function getFixerByName(string $name): FixerInterface
    {
        static $fixers = null;

        if ($fixers === null) {
            $factory = self::fixerFactory();

            $fixers = [];
            foreach ($factory->getFixers() as $fixer) {
                $fixers[$fixer->getName()] = $fixer;
            }
        }

        if (! \array_key_exists($name, $fixers)) {
            throw new \InvalidArgumentException(\sprintf('Fixer "%s" does not exist.', $name));
        }

        return $fixers[$name];
    }

    /**
     * Remove PHP-CS-Fixer rule sets (@...) and custom fixer.
     */
    public static function nativeRules(array $rules): array
    {
        foreach ($rules as $key => $value) {
            if (preg_match('/^(@)/', $key)) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }
}
