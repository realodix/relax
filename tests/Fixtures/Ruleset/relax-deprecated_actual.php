<?php
namespace Realodix\Relax;

class RelaxDeprecatedSets extends Config
{
    public function cast_notation()
    {
        $b =  2;

        // no_unset_cast
        $a = (unset) $b;
    }

    public function string_notation__simple_to_complex_string_variable()
    {
        $name = 'World';

        echo "Hello ${name}!";
        echo <<<TEST
        -Hello ${name}!
        TEST;
    }
}
