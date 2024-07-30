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
        echo "My name is {$name} !";
    }

    public function string_notation__string_implicit_backslashes()
    {
        $singleQuoted = 'String with \" and My\Prefix\\';
        $doubleQuoted = "Interpret my \n but not my \\a";
        $hereDoc = <<<HEREDOC
        Interpret my \100 but not my \\999
        HEREDOC;
    }

    public function customFixer__NoDoctrineMigrationsGeneratedCommentFixer()
    {
        $this->addSql('UPDATE t1 SET col1 = col1 + 1');

        $this->addSql('UPDATE t1 SET col1 = col1 - 1');
    }

    public function customFixer__NoPhpStormGeneratedCommentFixer() {}
}

class MyTest extends \PhpUnit\FrameWork\TestCase
{
    /**
     * @covers \Project\NameSpace\Something
     *
     * @coversDefaultClass \Project\Default
     *
     * @uses \Project\Test\Util
     */
    public function testPhpUnitFqcnAnnotation() {}
}

class NoUselessDoctrineRepositoryCommentFixer {}
