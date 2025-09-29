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
 * phpdoc_align
 *
 * @property int $a
 * @property-read int       $b
 * @property-write string         $c
 */
class PhpdocAlign
{
    /**
     * @param   string  $a Lorem Ipsum is simply dummy text of the printing and
     * typesetting industry.
     * @param int  $b            Lorem Ipsum has been the industry's standard dummy text ever
     * since the 1500s, when an unknown printer took a galley of type
     * and scrambled it to make a type specimen book.
     */
    public function phpdoc__phpdoc_align($a, $b) {}
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
    /**
     * @var int
     */
    const C2 = 2;

    /** @var int */
    const C1 = 1;

    const C3 = 3;
    const C4 = 4;


    const C5 = 5;
    protected function foo() {}
    protected function bar() {}
}
enum ClassAttributesSeparationEnum
{
    case Case1;

    case Case2;
    case Case3;

    case Case4;
}

/**
 * class_definition
 */
class  ClassDefinition  extends  Bar  implements  Baz,  BarBaz  {}
final  class  ClassDefinitionFinal  extends  Bar  implements  Baz,  BarBaz  {}
trait  ClassDefinitionTrait  {}
interface Bar extends
    Bar, BarBaz, FooBarBaz {}
$space_before_parenthesis = new class{};
$inline_constructor_arguments= new class(
    $bar,
    $baz
) {};

/**
 * modifier_keywords
 */
class ModifierKeywords
{
    var $a;

    static protected $var_foo2;

    const SAMPLE = 1;

    function A() {}
}

/**
 * ordered_class_elements
 */
final class OrderedClassElements
{
    use TraiB;
    use TraiA;
    protected static $protStatProp;
    const C1 = 1;
    const C2 = 2;
    public static $pubStatProp1;
    public $pubProp1;
    protected $protProp;
    var $pubProp2;
    private static $privStatProp;
    private $privProp;
    public static $pubStatProp2;
    public $pubProp3;
    protected function __construct() {}
    private static function privStatFunc() {}
    public function pubFunc1() {}
    public function __toString() {}
    protected function protFunc() {}
    function pubFunc2() {}
    public static function pubStatFunc1() {}
    public function pubFunc3() {}
    static function pubStatFunc2() {}
    private function privFunc() {}
    public static function pubStatFunc3() {}
    protected static function protStatFunc() {}
    public function __destruct() {}
}

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
        return self::class . self::test() . self::$A;
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
