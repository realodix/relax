<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use Realodix\Relax\RuleSet\RuleSetInterface;

use function is_string;

class relax_actual extends Config
{
    // no_blank_lines_after_class_opening

    // type_declaration_spaces
    private bool $type_declaration_spaces;

    public $visibility_required; // visibility_required

    protected static $visibility_required2; // visibility_required

    // type_declaration_spaces
    public function __invoke(array $type_declaration_spaces) {}

    public function __construct(
        ?RuleSetInterface $ruleSet
    ) {}

    /**
     * magic_method_casing
     */
    public function __sleep()
    {
        (new stdClass)->__invoke(1);
    }

    public function alias__no_alias_functions()
    {
        $b = 'string';
        $$c = 'string';

        rtrim($b);
        closedir($b);
        floatval($b);
        fwrite($b, $c);
        get_included_files();
        ini_set($b, $c);
        is_float($b);
        is_int($b);
        is_int($b);
        is_writable($b);
        implode($glue, $pieces);
        array_key_exists($key, $array);
        set_magic_quotes_runtime($new_setting);
        current($array);
        highlight_file($filename, true);
        count(['foo']);
        strstr($haystack, $needle);
        imap_headerinfo($imap_stream, 1);
        trigger_error($message);
    }

    public function alias__no_alias_language_construct_call()
    {
        exit;
    }

    public function array_notation__array_syntax()
    {
        return [];
    }

    public function array_notation__no_multiline_whitespace_around_double_arrow()
    {
        $a = [1 => 2];
    }

    public function array_notation__no_whitespace_before_comma_in_array()
    {
        $a = [1, '2'];
    }

    public function array_notation__trim_array_spaces()
    {
        $sample = [];
        $sample = ['a', 'b'];
    }

    public function basic__braces_position()
    {
        // anonymous_classes_opening_brace
        // functions_opening_brace
        $foo = new class
        {
            public function bar()
            {
                return 1;
            }
        };

        // allow_single_line_anonymous_functions
        $foo = function () { return true; };
    }

    public function basic__no_trailing_comma_in_singleline()
    {
        foo(true);

        $foo = [1];

        [$foo, $bar] = [];

        // use a\{ClassA, ClassB,};
    }

    public function basic__single_line_empty_body() {}

    public function casing__class_reference_name_casing()
    {
        new stdClass;
        throw new \Exception;
    }

    public function casing__constant_case()
    {
        $a = false;
        $b = true;
        $c = null;
    }

    public function casing__lowercase_keywords()
    {
        return true;
    }

    public function casing__magic_constant_casing()
    {
        echo __DIR__;
    }

    public function casing__native_function_casing()
    {
        strlen('');
    }

    public function casing__native_type_declaration_casing(int $foo): int
    {
        return 1;
    }

    public function cast_notation()
    {
        $a = 1;
        $b = 2;

        // cast_spaces
        $bar = (string) $a;
        $foo = (int) $b;

        // lowercase_cast
        $a = (bool) $b;

        // no_short_bool_cast
        $a = (bool) $b;

        // short_scalar_cast
        $a = (bool) $b;
        $a = (int) $b;
        $a = (float) $b;
        $a = (string) $b;
    }

    public function class_notation__ordered_types(null|string|int $foo): null|string|int
    {
        return null;
    }

    public function class_notation__visibility_required() {}

    public function comment__single_line_comment_spacing()
    {
        // comment 1
        // comment 2
        /* comment 3 */
    }

    public function control_structure__control_structure_braces()
    {
        if (foo()) {
            echo 'Hello!';
        }
    }

    public function control_structure__elseif()
    {
        if (true) {
        } elseif (false) {
        }
    }

    public function control_structure__no_unneeded_braces()
    {
        switch (true) {
            case 1:
                break;
        }

        echo 1;
    }

    public function control_structure__no_unneeded_control_parentheses()
    {
        $x = true;
        $y = true;

        while ($x) {
            while ($y) {
                break 2;
            }
        }
        clone $x;
        while (true) {
            continue;
        }
        echo 'foo';
        echo 'foo';

        return 1 + 2;
        switch ($x) {
            case $x:
        }
        yield 2;
    }

    public function control_structure__no_useless_else()
    {
        if (true) {
            return 1;
        }

        return 2;
    }

    public function control_structure__switch_case_semicolon_to_colon()
    {
        switch (true) {
            case 1:
                break;
            default:
                break;
        }
    }

    public function control_structure__yoda_style()
    {
        $a = null;
        $c = null;
        $foo = [1];
        $bar = [1];

        if ($a === null) {
            echo 'null';
        }

        $b = $c != 1;  // equal
        $a = $b === 1; // identical
        $c = $c > 3;   // less than

        return $foo === count($bar);
    }

    public function function_notation__lambda_not_used_import()
    {
        $bar = 1;
        $foo = function () {};
    }

    public function function_notation__no_unreachable_default_argument_value($foo, $bar) {}

    public function function_notation__nullable_type_declaration_for_default_null_value(?string $str = null) {}

    public function function_notation__nullable_type_declaration_for_default_null_value_2(null|string|int $str = null) {}

    public function function_notation__nullable_type_declaration_for_default_null_value_3(null|(\Foo&\Bar) $str = null) {}

    public function language_construct__nullable_type_declaration(?int $value, ?\Closure $callable): ?int
    {
        return 1;
    }

    public function language_construct__combine_consecutive_unsets()
    {
        unset($a, $b);
    }

    public function language_construct__single_space_around_construct()
    {
        $foo = new Foo;
        echo $foo->bar();
        throw new \Exception;
        // line break
        // menggantikan PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer
        $b = new Foo;
        echo true;
    }

    public function list_notation__list_syntax()
    {
        [$sample] = true;
    }

    public function operator__binary_operator_spaces()
    {
        $y = new \stdClass;
        $a = 1 + 2 ^ 3 !== 4 or 5;

        $array = [
            'foo' => 1,
            'barr' =>    2,
            'bazzz' => 3,
        ];
    }

    public function operator__concat_space()
    {
        $foo = 'bar'. 3 .'bazqux';
    }

    public function operator__increment_style()
    {
        $a = 1;
        $a++;
        $a--;
    }

    public function operator__new_with_parentheses()
    {
        $y = new class {};
        $x = new X;
    }

    public function operator__no_useless_concat_operator()
    {
        $a = 'ab';
    }

    public function operator__no_useless_nullsafe_operator()
    {
        echo $this->parentMethod();
    }

    public function operator__not_operator_with_successor_space()
    {
        if (! true) {
            echo 'Help!';
        }
    }

    public function operator__object_operator_without_whitespace()
    {
        $finder = \Symfony\Component\Finder\Finder::create();
        $finder->in(__DIR__);
    }

    public function operator__operator_linebreak()
    {
        return true
            || false;
    }

    #[Foo]
    #[Bar, Baz]
    public function attribute_notation__attribute_empty_parentheses() {}

    /**
     * This is a DOC Comment
     * with a line not prefixed with asterisk
     */
    public function phpdoc__align_multiline_comment() {}

    /**
     * This is a DOC Comment
     */
    public function phpdoc__no_blank_lines_after_phpdoc() {}

    public function phpdoc__no_empty_phpdoc() {}

    /**
     * @param mixed $foo
     */
    public function phpdoc__no_superfluous_phpdoc_tags($foo /* , $unusedParam = null */) {}

    /**
     * @param string $a
     * @param int    $b
     */
    public function phpdoc__phpdoc_align($a, $b) {}

    /**
     * @param string $foo
     * @param bool   $bar Bar
     * @return int  Return the number of changes.
     *
     * @throws \Exception|\RuntimeException foo
     */
    public function phpdoc__phpdoc_order($foo, $bar) {}

    /**
     * Annotations in wrong order
     *
     * @param int   $a
     * @param array $b
     * @param Foo   $c
     */
    public function phpdoc__phpdoc_param_order($a, $b, $c) {}

    /**
     * @param int   $a
     * @param bool  $b
     * @param float $c
     * @return float
     */
    public function phpdoc__phpdoc_scalar($a, $b, $c) {}

    public function phpdoc__phpdoc_single_line_var_spacing()
    {
        /** @var MyClass $a */
        $a = test();
    }

    /**
     * Foo function is great
     */
    public function phpdoc__phpdoc_summary() {}

    /**
     * {@inheritdoc}
     */
    public function phpdoc__phpdoc_tag_type() {}

    public function phpdoc__phpdoc_to_comment()
    {
        /** This should be a comment */
        $foo = true;

        // ignored_tags
        /** @todo This should be a PHPDoc as the tag is on "ignored_tags" list */
        $bar = true;

        // allow_before_return_statement
        /** @var class-string */
        return \stdClass::class;
    }

    /**
     * Summary.
     *
     * Description that contain 4 lines,
     *
     *
     * while 2 of them are blank!
     *
     * @param string $foo
     *
     * @dataProvider provideFixCases
     */
    public function phpdoc__phpdoc_trim_consecutive_blank_line_separation($foo) {}

    /**
     * @param null|string|int|\Foo             $bar
     * @param \RuntimeException|CacheException $e
     */
    public function phpdoc__phpdoc_types_order($bar, $e) {}

    public function phpdoc__phpdoc_var_annotation_correct_order()
    {
        /** @var int $foo */
        $foo = 2 + 2;
    }

    public function return_notation__no_useless_return()
    {
        if (true) {
            return;
        }
    }

    public function return_notation__simplified_null_return()
    {
        return null;
    }

    public function semicolon__multiline_whitespace_before_semicolons()
    {
        $a = 1 + 2;

        $finder = \Symfony\Component\Finder\Finder::create();

        $finder->in(__DIR__)
            ->append(['.php-cs-fixer.dist.php', 'bin/relax']);

        $finder->in(__DIR__)
            ->append(['.php-cs-fixer.dist.php', 'bin/relax']);
    }

    public function semicolon__no_empty_statement()
    {
        $a = 1;
        echo 1;
        while (foo()) {
            continue;
        }
    }

    public function string_notation__heredoc_to_nowdoc()
    {
        $a = <<<'TEST'
        Foo
        TEST;
    }

    public function string_notation__no_binary_string()
    {
        $a = 'foo';

        $a = <<<'EOT'
                foo
        EOT;
    }

    public function string_notation__single_quote()
    {
        $a = 'sample';
        $b = "sample with 'single-quotes'";
    }

    public function whitespace__compact_nullable_type_declaration(?string $str): ?string
    {
        return 'foo';
    }

    public function whitespace__blank_line_before_statement()
    {
        function getValues()
        {
            yield 1;
            yield 2;
            // comment
            yield 3;
        }

        $foo = 0;
        do {
            echo $foo;
        } while ($foo > 0);
        $foo = 0;
        if (true) {
            $foo = true;
        }
        $a = 9000;
        switch ($a) {
            case 42:
                break;
        }
        if ($a === null) {
            $foo = 0;
            throw new \UnexpectedValueException('A cannot be null.');
        }

        foreach ([] as $bar) {
            if ($bar->isTired()) {
                $bar->sleep();

                continue;
            }
        }
        switch (true) {
            case 42:
                $bar->process();
                break;
            case 44:
                break;
        }

        return 1;
    }

    public function whitespace__method_chaining_indentation()
    {
        $finder = \Symfony\Component\Finder\Finder::create();

        $finder->in(__DIR__)
            ->append(['.php-cs-fixer.dist.php', 'bin/relax'])
            ->notName('*_actual.php');
    }

    public function whitespace__no_extra_blank_lines()
    {
        // extra
        $foo = ['foo'];

        $bar = 'bar';

        // return
        return $bar;
    }

    public function whitespace__no_extra_blank_lines_throw()
    {
        throw new \Exception('Hello!');
    }

    public function whitespace__no_extra_blank_lines_2()
    {
        // 'switch', 'case', 'default'
        switch (true) {
            case 1:
            default:
                echo 3;
        }

        // 'break'
        switch (true) {
            case 41:
                echo 'foo';
                break;

            case 42:
                break;
        }

        // 'continue'
        for ($i = 0; $i < 9000; $i++) {
            if (true) {
                continue;
            }
        }

        // curly_brace_block
        for ($i = 0; $i < 9000; $i++) {
            echo $i;
        }

        // parenthesis_brace_block
        $foo = is_string(
            'foo'
        );

        // square_brace_block
        $foo = [
            'foo',
        ];
    }

    public function whitespace__spaces_inside_parentheses()
    {
        if (true) {
            foo();
        }
    }

    public function whitespace__statement_indentation()
    {
        $foo = true;

        if ($foo == true) {
            echo 'foo';
        } else {
            echo 'bar';
        }
    }

    public function whitespace__types_spaces(int|string $x, int|string $y) {}

    /*
     * Laravel rules
     *
     * ---------------------------------------
     */

    public function array_notation__whitespace_after_comma_in_array()
    {
        $sample = [1, 2, 3, 4, 5];
    }

    public function function_notation__function_declaration()
    {
        // closure_fn_spacing
        $f = fn() => null;
        $f = fn() => null;

        // closure_function_spacing
        $f = function () {};
        $f = function () {};
    }

    public function function_notation__method_argument_space()
    {
        // 'on_multiline' => 'ignore'
        function sample($a = 10,
            $b = 20, $c = 30) {}
        sample(1,
            2);
        function sample2(
            $a = 10,
            $b = 20,
            $c = 30
        ) {}
        sample2(
            1,
            2
        );

        // 'after_heredoc' => true
        sample(
            <<<'EOD'
        foo
        EOD,
            'bar'
        );

        // Default value
        // 'keep_multiple_spaces_after_comma' => false
        function sample3($a = 10, $b = 20, $c = 30) {}
        sample3(1, 2);
    }

    public function operator__unary_operator_spaces($a, ...   $b)
    {
        $sample = 2;
        $c = $sample;

        $sample++;
        $sample--;
        $sample = ~     $c;
    }

    /**
     * @deprecated
     *
     * @see
     *
     * @param string $a
     * @return void
     *
     * @throws \Exception
     * @throws \RuntimeException
     *
     * @psalm-pure
     * @psalm-template T
     *
     * @phpstan-pure
     * @phpstan-template T
     */
    public function phpdoc__phpdoc_separation($a) {}

    public function semicolon__space_after_semicolon()
    {
        for ($i = 0;; $i++) {
        }
    }
}

// no_closing_tag
