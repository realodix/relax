<?php

// blank_line_after_opening_tag

namespace OtherNamespace; // blank_lines_before_namespace

// blank_line_after_namespace

const AAAA = '';
const BBB = '';

namespace Realodix\Relax; // no_leading_namespace_whitespace

use const OtherNamespace\AAAA;
use const OtherNamespace\BBB;

use OtherNamespace\AAC;
use OtherNamespace\Acme;
use OtherNamespace\Bar;

use function CCC\AA;
use function DDD;

/**
 * ordered_imports
 * blank_line_between_import_groups
 */
class Commonbox2
{
    public function funcClass()
    {
        new AAC;
        new Acme;
        new Bar;
    }

    public function funcFunction()
    {
        AA();
        DDD();
    }

    public function funcConst()
    {
        echo AAAA;
        echo BBB;
    }
}

// no_closing_tag
