<?php

/**
 * no_blank_lines_after_class_opening
 */
class NoBlankLinesAfterClassOpening
{



    protected function foo()
    {
    }
}

/**
 * braces_position
 */
class BracesPosition {
    public function basic__braces_position()
    {
        // allow_single_line_anonymous_functions
        $foo = function () { return true; };

        // allow_single_line_empty_anonymous_classes
        $foo = new class { };
        $bar = new class { private $baz; };

        // anonymous_classes_opening_brace
        $foo = new class {
            // functions_opening_brace
            public function bar() {
                return 1;
            }
        };

        // anonymous_functions_opening_brace
        $foo = function () {
        };

        // control_structures_opening_brace
        if (foo())
        {
            bar();
        }
    }
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
class  ClassDefinition  extends  Bar  implements  Baz,  BarBaz  {}
final  class  ClassDefinitionFinal  extends  Bar  implements  Baz,  BarBaz  {}
trait  ClassDefinitionTrait  {}
$foo = new  class  extends  Bar  implements  Baz,  BarBaz {};

/**
 * ordered_interfaces
 */
final class ExampleA implements Gamma, Alpha, Beta {}
interface ExampleB extends Gamma, Alpha, Beta {}

/**
 * ordered_traits
 */
class OrderedTraits
{
    use Z;
    use A;
}

/**
 * phpdoc_no_useless_inheritdoc
 */
class PhpdocNoUselessInheritdoc
{
    /**
     * {@inheritdoc}
     */
    function func() {}
}

/**
 * single_class_element_per_statement
 */
class SingleClassElementPerStatement
{
    const FOO_1 = 1, FOO_2 = 2;

    private static $bar1 = [1, 2, 3], $bar2 = [1, 2, 3];
}

/**
 * self_static_accessor
 */
final class SelfStaticAccessor
{
    private static $A = 1;

    public function getBar()
    {
        return static::class.static::test().static::$A;
    }
}

/**
 * single_line_empty_body
 */
class SingleLineEmptyBody
{
    public function __construct(
        int $ruleSet
    )
    {}

    public function basic__single_line_empty_body()
    {
    }
}

/**
 * type_declaration_spaces
 */
class TypeDeclarationSpaces
{
    private string    $a;

    private bool   $b;

    public function __invoke(array   $c) {}
}

/**
 * visibility_required
 */
class VisibilityRequired
{
    var $a;

    static protected $var_foo2;

    const SAMPLE = 1;

    function A() {}
}
