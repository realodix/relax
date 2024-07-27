<?php

class relaxplus
{
    public function control_structure__no_superfluous_elseif()
    {
        if (true) {
            return 1;
        } elseif (false) {
            return 2;
        }
    }

    public function string_notation__explicit_string_variable()
    {
        $name = 'foo';
        $a = "My name is $name !";
    }
}
