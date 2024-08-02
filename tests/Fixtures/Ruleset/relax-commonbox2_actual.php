<? // full_opening_tag, linebreak_after_opening_tag, blank_line_after_opening_tag

namespace OtherNamespace; // blank_lines_before_namespace
// blank_line_after_namespace

const AAAA = "";
const BBB = "";

    namespace Realodix\Relax; // no_leading_namespace_whitespace

use OtherNamespace\Acme;
use OtherNamespace\Bar, OtherNamespace\AAC;
use \OtherNamespace\no_leading_import_slash;
use SingleImportPerStatement\{SIPSA, SIPSAA};
use SingleImportPerStatement\SIPSB;use SingleImportPerStatement\SIPSC;
use const OtherNamespace\BBB;
use const OtherNamespace\AAAA;
use function DDD;
use function CCC\AA;
/**
 * ordered_imports
 * blank_line_between_import_groups
 * single_import_per_statement
 * single_line_after_imports
 */
class Commonbox2
{
    public function funcClass()
    {
        new AAC;
        new Acme;
        new Bar;
        new no_leading_import_slash;

        [new SIPSA, new SIPSAA, new SIPSB, new SIPSC];
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
?>
