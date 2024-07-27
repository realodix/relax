<?php

namespace Realodix\Relax;

class RelaxCustom
{
    /**
     * @var self PhpdocSelfAccessorFixer
     */
    private $instance;

    /**
     * @var array<int, string>
     */
    private $phpdocTypesCommaSpacesFixer;

    /**
     * Hello
     * World!
     */
    public function multilineCommentOpeningClosingAloneFixer() {}

    public function noImportFromGlobalNamespaceFixer(\DateTime $dateTime) {}

    public function noPhpStormGeneratedCommentFixer() {}

    public function phpdocNoSuperfluousParamFixer() {}

    /**
     * @param null|string $x
     */
    public function phpdocTypesTrimFixer($x) {}
}
