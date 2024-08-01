<?php

class relaxplus
{
    public function basic__numeric_literal_separator()
    {
        $integer = 12_345_678;
        $octal = 0123_456;
        $binary = 0b00100100_11011010;
        $hexadecimal = 0x3D_45_8F_4F;

        // override_existing
        echo 12_345_678;
    }

    /*
     * Multiline comment with arbitrary asterisks count
     */
    public function comment__multiline_comment_opening_closing() {}

    public function control_structure__no_superfluous_elseif()
    {
        if (true) {
            return 1;
        }
        if (false) {
            return 2;
        }
    }

    public function operator__assign_null_coalescing_to_coalesce_equal()
    {
        $foo ??= 1;
    }

    public function operator__ternary_to_null_coalescing()
    {
        $a = true;
        $b = true;

        $sample = $a ?? $b;
    }

    /**
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/phpdoc/phpdoc_no_alias_tag.rst
     */
    public function phpdoc__phpdoc_no_alias_tag()
    {
        /** @var string */
        $foo = 'https://github.com/PHP-CS-Fixer/PHP-CS-Fixer';
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

/**
 * class_definition
 */
class ClassDefinition extends Bar implements BarBaz, Baz {}
final class ClassDefinitionFinal extends Bar implements BarBaz, Baz {}
trait ClassDefinitionTrait {}
interface Bar extends Bar, BarBaz, FooBarBaz {}
$space_before_parenthesis = new class {};
$inline_constructor_arguments = new class ($bar, $baz) {};

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
