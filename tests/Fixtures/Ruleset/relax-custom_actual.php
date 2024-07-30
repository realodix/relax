<?php
namespace Realodix\Relax;

use DateTime;

class RelaxCustom
{
    /**
     * @var RelaxCustom PhpdocSelfAccessorFixer
     */
    private $instance;

    /**
     * @var array<int,string>
     */
    private $phpdocTypesCommaSpacesFixer;

    /** Hello
     * World!
     */
    public function multilineCommentOpeningClosingAloneFixer() {}

    public function noImportFromGlobalNamespaceFixer(DateTime $dateTime) {}

    public function noUselessParenthesisFixer()
    {
        is_bool((true));
    }

    /**
     * @param bool   $b
     * @param int    $i
     * @param string $s this is string
     * @param string $s duplicated
     */
    public function phpdocNoSuperfluousParamFixer() {}

    /**
     * @param string $foo Comment
     * @param $bar Comment
     */
    public function phpdocParamTypeFixer($foo, $bar) {}

    /**
     * @param null | string $x
     */
    public function phpdocTypesTrimFixer($x) {}
}

class MultilineCommentOpeningClosingAloneFixer
{
    public function __construct(private array $a, private bool $b, private int $i) {}
}

/**
 * Option: minimum_number_of_parameters
 */
class MultilineCommentOpeningClosingAloneFixerTwo
{
    public function __construct(private array $a, private bool $b) {}
}

/**
 * Option: minimum_number_of_parameters
 */
class MultilineCommentOpeningClosingAloneFixerThree
{
    public function __construct(private array $a) {}
}
