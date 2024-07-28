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
