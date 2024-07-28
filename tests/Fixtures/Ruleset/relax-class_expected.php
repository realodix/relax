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
