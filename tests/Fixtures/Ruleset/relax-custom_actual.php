<?php
namespace Realodix\Relax;

use DateTime;

class RelaxCustom
{
    /**
     * @var RelaxCustom PhpdocSelfAccessorFixer
     */
    private $instance;

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
     * @param int | string $x
     */
    public function phpdocTypesTrimFixer($x) {}
}
