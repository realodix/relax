<?php

namespace Realodix\Relax\Tests;

use PhpCsFixer\ConfigInterface;
use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet\RuleSet as PhpCsFixerRuleSet;
use PHPUnit\Framework\TestCase;
use Realodix\Relax\Config;
use Realodix\Relax\Tests\Fixtures\RuleSet;
use Realodix\Relax\Tests\Fixtures\RuleSetWithoutName;

class RuleSetTest extends TestCase
{
    protected function getRuleSetName($ruleSet): string
    {
        return (new \ReflectionClass($ruleSet))->getShortName();
    }

    /**
     * It implements only interface methods
     *
     * @test
     */
    public function itImplementsOnlyInterfaceMethods(): void
    {
        $reflect = new \ReflectionClass(new RuleSet);
        $this->assertCount(1, $reflect->getMethods(\ReflectionMethod::IS_PROTECTED));
        $this->assertCount(2, $reflect->getMethods(\ReflectionMethod::IS_PUBLIC));
    }

    /**
     * Rule set is called via method
     *
     * @test
     */
    public function ruleSetIsCalledViaMethod(): void
    {
        $this->assertInstanceOf(
            ConfigInterface::class,
            Config::create(new RuleSet)
        );
    }

    /**
     * Rule set is called via string
     *
     * @test
     */
    public function ruleSetIsCalledViaString(): void
    {
        $this->assertInstanceOf(
            ConfigInterface::class,
            Config::create('@Realodix')
        );
    }

    /**
     * Rule set is called via string, but not valid
     *
     * @test
     */
    public function ruleSetIsCalledViaStringButNotValid(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create('string')
        );
    }

    /**
     * Rule set is called via string, but not valid
     *
     * @test
     */
    public function ruleSetIsCalledViaStringButNotValid2(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create('Realodix')
        );
    }

    /**
     * Rule set is called via string, but not valid
     *
     * @test
     */
    public function ruleSetIsCalledViaStringButNotValid3(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create('realodix')
        );
    }

    /**
     * Rule set is called via string, but not valid
     *
     * @test
     */
    public function ruleSetNotValid(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Config::create(1)
        );
    }

    /**
     * Rule set is called via array
     *
     * @test
     */
    public function ruleSetIsCalledViaArray(): void
    {
        $this->assertInstanceOf(
            ConfigInterface::class,
            Config::create(['foo' => 'bar'])
        );
    }

    /**
     * It valid name
     *
     * @test
     */
    public function itValidName(): void
    {
        $this->assertStringContainsString(
            $this->getRuleSetName(new RuleSet),
            Config::create(new RuleSet)->getName()
        );
    }

    /**
     * It valid name without set name
     *
     * @test
     */
    public function itValidNameWithoutSetName(): void
    {
        $this->assertStringContainsString(
            $this->getRuleSetName(new RuleSetWithoutName),
            Config::create(new RuleSetWithoutName)->getName()
        );
    }

    /**
     * User dapat menambahkan/menonaktifkan rules
     *
     * @test
     */
    public function canAddCustomRules(): void
    {
        $rules1 = Config::create(new RuleSet)->getRules();
        $rules2 = ['foo' => 'bar'];
        $total = count($rules1) + count($rules2);

        $this->assertSame(
            $total,
            count(Config::create(new RuleSet, $rules2)->getRules())
        );
    }

    /**
     * Realodix returns a valid PhpCsFIxer rules
     *
     * @test
     */
    public function realodixReturnsAValidPhpCsFIxerRules(): void
    {
        $rules = $this->getCleanedRules(new \Realodix\Relax\RuleSet\Realodix);
        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new PhpCsFixerRuleSet($rules));

        $this->assertIsArray($factory->getFixers());
    }

    /**
     * RealodixPlus returns a valid PhpCsFIxer rules
     *
     * @test
     */
    public function realodixPlusReturnsAValidPhpCsFIxerRules(): void
    {
        $rules = $this->getCleanedRules(new \Realodix\Relax\RuleSet\RealodixPlus);
        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new PhpCsFixerRuleSet($rules));

        $this->assertIsArray($factory->getFixers());
    }

    /**
     * Remove PHP-CS-Fixer rule sets (@...) and custom fixer
     */
    protected function getCleanedRules($ruleSet): array
    {
        $rules = Config::create($ruleSet)->getRules();

        foreach ($rules as $key => $value) {
            if (preg_match('/^(@|[a-zA-Z0-9]+\/)/', $key)) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }
}
