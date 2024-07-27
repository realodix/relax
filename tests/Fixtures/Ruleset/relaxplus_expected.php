<?php

class relaxplus
{
    public function control_structure__no_superfluous_elseif()
    {
        if (true) {
            return 1;
        }
        if (false) {
            return 2;
        }
    }

    public function string_notation__explicit_string_variable()
    {
        $name = 'foo';
        $a = "My name is {$name} !";
    }

    public function customFixer__NoDoctrineMigrationsGeneratedCommentFixer()
    {
        $this->addSql('UPDATE t1 SET col1 = col1 + 1');

        $this->addSql('UPDATE t1 SET col1 = col1 - 1');
    }
}

class MyTest extends \PhpUnit\FrameWork\TestCase
{
    /**
     * php_unit_method_casing
     */
    public function testMyCode() {}
}
