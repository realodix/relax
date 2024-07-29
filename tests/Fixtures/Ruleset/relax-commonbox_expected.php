<?php

/**
 * no_blank_lines_after_class_opening
 */
class NoBlankLinesAfterClassOpening
{
    protected function foo() {}
}

/**
 * class_attributes_separation
 */
class ClassAttributesSeparation
{
    use trait_a;
    use trait_b;

    private $a;

    private $b;

    /** @var int */
    const SECOND = 1;

    /** @var int */
    const MINUTE = 60;

    protected function foo() {}

    protected function bar() {}
}

/**
 * class_definition
 */
class ClassDefinition extends Bar implements BarBaz, Baz {}
final class ClassDefinitionFinal extends Bar implements BarBaz, Baz {}
trait ClassDefinitionTrait {}
$foo = new class extends Bar implements BarBaz, Baz {};

/**
 * ordered_interfaces
 */
final class ExampleA implements Alpha, Beta, Gamma {}
interface ExampleB extends Alpha, Beta, Gamma {}

/**
 * ordered_traits
 */
class OrderedTraits
{
    use A;
    use Z;
}

/**
 * phpdoc_no_useless_inheritdoc
 */
class PhpdocNoUselessInheritdoc
{
    public function func() {}
}

/**
 * self_static_accessor
 */
final class SelfStaticAccessor
{
    private static $A = 1;

    public function getBar()
    {
        return self::class.self::test().self::$A;
    }
}

/**
 * single_line_empty_body
 */
class SingleLineEmptyBody
{
    public function __construct(
        int $ruleSet
    ) {}

    public function basic__single_line_empty_body() {}
}

/**
 * type_declaration_spaces
 */
class TypeDeclarationSpaces
{
    private string $a;

    private bool $b;

    public function __invoke(array $c) {}
}

/**
 * visibility_required
 */
class VisibilityRequired
{
    public $a;

    protected static $var_foo2;

    const SAMPLE = 1;

    public function A() {}
}
