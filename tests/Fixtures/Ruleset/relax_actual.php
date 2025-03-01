<?php

// declare_equal_normalize
declare(ticks =  1);
// declare_parentheses
declare ( strict_types=1 );
use Realodix\Relax\no_unneeded_import_alias as no_unneeded_import_alias;
use Realodix\Relax\no_unused_imports;

class relax_actual extends no_unneeded_import_alias
{
    /**
     * magic_method_casing
     */
    public function __Sleep()
    {
        (new stdClass())->__INVOKE(1);
    }

    public function alias__no_alias_functions()
    {
        $b = 'string';
        $$c = 'string';

        chop($b);
        close($b);
        doubleval($b);
        fputs($b, $c);
        get_required_files();
        ini_alter($b, $c);
        is_double($b);
        is_integer($b);
        is_long($b);
        is_writeable($b);
        join($glue, $pieces);
        key_exists($key, $array);
        magic_quotes_runtime($new_setting);
        pos($array);
        show_source($filename, true);
        sizeof(['foo']);
        strchr($haystack, $needle);
        imap_header($imap_stream, 1);
        user_error($message);
    }

    public function alias__no_alias_language_construct_call()
    {
        die;
    }

    public function alias__no_mixed_echo_print()
    {
        print 'example';
    }

    public function array_notation__array_syntax()
    {
        return array();
    }

    public function array_notation__no_multiline_whitespace_around_double_arrow()
    {
        $a = [1

        => 2];
    }

    public function array_notation__no_whitespace_before_comma_in_array()
    {
        $a = [1 , '2'];
    }

    public function array_notation__trim_array_spaces()
    {
        $sample = [ ];
        $sample = [ 'a', 'b' ];
    }

    public function basic__no_multiple_statements_per_line()
    {
        foo(); bar();
    }

    public function basic__no_trailing_comma_in_singleline()
    {
        foo(true,);

        $foo = [1,];

        [$foo, $bar,] = [];

        // use a\{ClassA, ClassB,};
    }

    public function casing__class_reference_name_casing() {
        new StdClass;
        throw new \exception();
    }

    public function casing__constant_case() {
        $a = FALSE;
        $b = True;
        $c = nuLL;
    }

    public function casing__lowercase_keywords()
    {
        RETURN True;
    }

    public function casing__lowercase_static_reference()
    {
        STATIC::baz2();
        true instanceof SELF;
    }

    public function casing__magic_constant_casing()
    {
        echo __dir__;
    }

    public function casing__native_function_casing()
    {
        STRLEN('');
    }

    public function casing__native_type_declaration_casing(INT $foo): INT
    {
        return 1;
    }

    public function cast_notation()
    {
        $a = 1;
        $b = 2;

        // cast_spaces
        $bar = ( string )   $a;
        $foo = (int)$b;

        // lowercase_cast
        $a = (BOOL) $b;

        // no_short_bool_cast
        $a = !! $b;

        // short_scalar_cast
        $a = (boolean) $b;
        $a = (integer) $b;
        $a = (double) $b;
        $a = (binary) $b;
    }

    public function class_notation__ordered_types(string|null|int $foo):string|null|int
    {
        return null;
    }

    public function comment__single_line_comment_spacing()
    {
        //comment 1
        #comment 2
        /*comment 3*/
    }

    public function comment__single_line_comment_style()
    {
        # hash comment

        /* asterisk comment */

        /*
         * asterisk comment-single
         */
    }

    public function control_structure__no_break_comment()
    {
        switch (true) {
            case 1:
                foo();
            case 2:
                bar();
                // no break
                break;
            case 3:
                baz();
        }
    }

    public function control_structure__control_structure_braces()
    {
        if (foo()) echo 'Hello!';
    }

    public function control_structure__control_structure_continuation_position()
    {
        if (true) {
            echo 'foo';
        }
        else {
            echo 'bar';
        }
    }

    public function control_structure__elseif()
    {
        if (true) {
        } else if (false) {
        }
    }

    public function control_structure__no_unneeded_braces()
    {
        switch (true) {
            case 1: {
                break;
            }
        }

        { echo 1; }
    }

    public function control_structure__no_unneeded_control_parentheses()
    {
        $x = true;
        $y = true;

        while ($x) { while ($y) { break (2); } }
        clone($x);
        while (true) { continue 1; }
        echo("foo");
        print("foo");
        return (1 + 2);
        switch ($x) { case($x); }
        yield(2);
    }

    public function control_structure__no_useless_else()
    {
        if (true) {
            return 1;
        } else {
            return 2;
        }
    }

    public function control_structure__switch_case_semicolon_to_colon()
    {
        switch (true) {
            case 1;
                break;
            default;
                break;
        }
    }

    public function control_structure__switch_case_space()
    {
        switch (true) {
            case 1      :
                break;
            default     :
                break;
        }
    }

    public function control_structure__yoda_style()
    {
        $a = null;
        $c = null;
        $foo = [1];
        $bar = [1];

        if (null === $a) {
            echo 'null';
        }

        $b = $c != 1;  // equal
        $a = 1 === $b; // identical
        $c = $c > 3;   // less than

        return $foo === count($bar);
    }

    public function function_notation__lambda_not_used_import()
    {
        $bar = 1;
        $foo = function() use ($bar) {};
    }

    public function function_notation__no_spaces_after_function_name()
    {
        strlen  ('Hello World!');
    }

    public function function_notation__no_unreachable_default_argument_value($foo = "two words", $bar) {}

    public function function_notation__nullable_type_declaration_for_default_null_value(string $str = null) {}

    public function function_notation__nullable_type_declaration_for_default_null_value_2(string|int $str = null) {}

    public function function_notation__nullable_type_declaration_for_default_null_value_3(\Foo&\Bar $str = null) {}

    public function function_notation__return_type_declaration() : void {}

    public function language_construct__nullable_type_declaration(null|int $value, null|\Closure $callable): ?int
    {
        return 1;
    }

    public function language_construct__combine_consecutive_unsets()
    {
        unset($a); unset($b);
    }

    public function language_construct__single_space_around_construct()
    {
        $foo = new    Foo();
        echo$foo->bar();
        throw  new  \Exception();

        // line break
        // menggantikan PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer
        $b = new
                Foo();
        echo
        true;
    }

    public function list_notation__list_syntax()
    {
        list($sample) = true;
    }

    public function operator__binary_operator_spaces()
    {
        $y =new \stdClass;
        $a= 1  + 2^ 3 !==  4 or   5;

        $array = [
            'foo'   =>1,
            'barr'=>  2,
            'bazzz'=> 3,
        ];
    }

    public function operator__concat_space()
    {
        return 'bar'. 3 . 'baz'.'qux';
    }

    public function operator__increment_style()
    {
        $a = 1;
        ++$a;
        --$a;
    }

    public function operator__new_with_parentheses()
    {
        // anonymous_class
        // If the anonymous class has no arguments, the () after class MUST be omitted.
        // https://github.com/php-fig/per-coding-style/blob/2.0.0/spec.md#8-anonymous-classes
        $y = new class() {};

        // named_class
        $x = new X();
    }

    public function operator__no_space_around_double_colon()
    {
        echo Foo\Bar :: class;
    }

    public function operator__no_useless_concat_operator()
    {
        $a = 'a'.'b';
    }

    public function operator__no_useless_nullsafe_operator()
    {
        echo $this?->parentMethod();
    }

    public function operator__object_operator_without_whitespace()
    {
        $finder = \Symfony\Component\Finder\Finder::create();
        $finder  ->  in(__DIR__);
    }

    public function operator__operator_linebreak()
    {
        // boolean operator
        $bool = true ||
            false;

        // non boolean operators
        $foo = 2 >
            1;
    }

    public function operator__ternary_operator_spaces()
    {
        $a = true   ?1 :0;
    }

    #[Foo()]
    #[Bar(), Baz()]
    public function attribute_notation__attribute_empty_parentheses() {}

    /**
            * This is a DOC Comment
with a line not prefixed with asterisk

   */
    public function phpdoc__align_multiline_comment() {}

    /**
     * This is a DOC Comment
     */

    public function phpdoc__no_blank_lines_after_phpdoc() {}

    /**
     *
     */
    public function phpdoc__no_empty_phpdoc()
    {
        /**  */
    }

    /**
     * @param mixed $allow_mixed
     * @param string|int|null $hidden_params
     * @param mixed $unused_params
     */
    public function phpdoc__no_superfluous_phpdoc_tags($allow_mixed /*, $hidden_params = null */) {}

    /**
     * @internal
     * @access private
     */
    public function phpdoc__phpdoc_no_access() {}

    /**
     * @internal
     * @param int    $b
     * @package Foo
     * subpackage Bar
     */
    public function phpdoc__phpdoc_no_package() {}

    /**
     * @throws \Exception|\RuntimeException foo
     * @return int Return the number of changes.
     * @param string $foo
     * @param bool   $bar Bar
     */
    public function phpdoc__phpdoc_order($foo, $bar) {}

    /**
     * Annotations in wrong order
     *
     * @param int   $a
     * @param Foo   $c
     * @param array $b
     */
    public function phpdoc__phpdoc_param_order($a, $b, $c) {}

    /**
     * @param integer $a
     * @param boolean $b
     * @param real $c
     * @return double
     */
    public function phpdoc__phpdoc_scalar($a, $b, $c) {}

    public function phpdoc__phpdoc_single_line_var_spacing()
    {
        /**@var   MyClass   $a   */
        $a = test();
    }

    /**
     * Foo function is great
     */
    public function phpdoc__phpdoc_summary() {}

    public function phpdoc__phpdoc_to_comment()
    {
        /** This should be a comment */
        foreach ([] as $key => $sqlite) {
            $sqlite->open('');
        }

        // ignored_tags
        /** @todo This should be a PHPDoc as the tag is on "ignored_tags" list */
        Url::withCount([
            'visits as unique_visit_count' => function (Builder $query) {
                /** @var Builder<\App\Models\Visit> $query */
                $query->where('is_first_click', true);
            },
        ]);

        // allow_before_return_statement
        /** \stdClass::class */
        return \stdClass::class;
    }

    /**
     * Summary.
     *
     *
     * Description that contain 4 lines,
     *
     *
     * while 2 of them are blank!
     *
     *
     * @param string $foo
     *
     *
     * @dataProvider provideFixCases
     */
    public function phpdoc__phpdoc_trim_consecutive_blank_line_separation($foo) {}

    /**
     * @param STRING|String[] $bar
     * @return inT[]
     */
    public function phpdoc__phpdoc_types($bar) {}

    /**
     * @param string|null|int|\Foo $bar
     * @param \RuntimeException|CacheException $e
     */
    public function phpdoc__phpdoc_types_order($bar, $e) {}

    public function phpdoc__phpdoc_var_annotation_correct_order()
    {
        /** @var $foo int */
        $foo = 2 + 2;
    }

    public function return_notation__no_useless_return()
    {
        if (true) {
            return;
        }

        return;
    }

    public function return_notation__simplified_null_return()
    {
        return null;
    }

    public function semicolon__multiline_whitespace_before_semicolons()
    {
        $a = 1 + 2
        ;

        $finder = \Symfony\Component\Finder\Finder::create();

        $finder->in(__DIR__)
            ->append(['.php-cs-fixer.dist.php', 'bin/relax'])
        ;

        $finder->in(__DIR__)
            ->append(['.php-cs-fixer.dist.php', 'bin/relax']);
    }

    public function semicolon__no_empty_statement()
    {
        $a = 1;;
        echo 1;2;
        while(foo()){
            continue 1;
        }
    }

    public function semicolon__no_singleline_whitespace_before_semicolons()
    {
        $this->foo() ;
    }

    public function string_notation__heredoc_to_nowdoc()
    {
        $a = <<<"TEST"
        Foo
        TEST;
    }

    public function string_notation__no_binary_string()
    {
        $a = b'foo';

        $a = b<<<EOT
                foo
        EOT;
    }

    public function string_notation__single_quote()
    {
        $a = "sample";
        $b = "sample with 'single-quotes'";
    }

    public function whitespace__array_indentation()
    {
        $foo = [
            'bar' => [
        'baz' => true,
            ],
        ];
    }

    public function whitespace__compact_nullable_type_declaration(? string $str): ? string
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
        $a = 100;
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
        $foo = array("foo");


        $bar = "bar";

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
        for ($i = 0; $i < 100; $i++) {
            if (true) {
                continue;

            }
        }

        // curly_brace_block
        for ($i = 0; $i < 100; $i++) {

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

    public function whitespace__no_spaces_around_offset()
    {
        $b = ['a' => true, 'b' => false];
        $sample = $b [ 'a' ] [ 'b' ];
    }

    public function whitespace__spaces_inside_parentheses()
    {
        if ( true ) {
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

    public function whitespace__types_spaces(int|string $x, int | string $y) {}

    /*
     * Laravel rules
     *
     * ---------------------------------------
     */

    public function array_notation__whitespace_after_comma_in_array()
    {
        $sample = [1,2, 3,  4,    5];
    }

    public function control_structure__trailing_comma_in_multiline()
    {
        // array
        [
            1,
            2
        ];

        // array_destructuring
        $a = [11, 2, 3];
        [
            $c,
            $d
        ] = $a;

        // arguments
        foo(
            1,
            2
        );

        // parameters
        function foo_trailing_comma_in_multiline(
            $x,
            $y
        ) {}

        // match
        match (true) {
            1 => '1',
            2 => '2'
        };

        // after_heredoc in array
        [
            'foo',
            <<<'EOD'
                bar
            EOD
        ];
    }

    public function function_notation__function_declaration()
    {
        // closure_fn_spacing
        // https://github.com/php-fig/per-coding-style/blob/2.0.0/spec.md#71-short-closures
        $fn = fn () => null;
        $fn = fn()=>null;

        // closure_function_spacing
        $func = function () {};
        $func = function() {};

        // trailing_comma_single_line
        $funcTr = function ($fn, $func,) {};
    }

    public function function_notation__method_argument_space()
    {
        // ---
        // on_multiline
        // 'on_multiline' => 'ensure_fully_multiline'
        function om_ensure_fully_multiline($a = 10,
            $b = 20, $c = 30) {}
        sample(1,
            2);
        // 'on_multiline' => 'ensure_single_line'
        function om_ensure_single_line(
            $a = 10,
            $b = 20,
            $c = 30
        ) {}
        sample(
            1,
            2,
        );


        // ---
        // after_heredoc
        sample(
            <<<'EOD'
        foo
        EOD
        ,
            'bar'
        );

        // ---
        // attribute_placement
        function attribute_placement(#[Foo] #[Bar] $a = 10,
            $b = 20, $c = 30) {}
        sample(1, 2);

        // ---
        // keep_multiple_spaces_after_comma
        sample('foo',    'foobarbaz', 'baz');
        sample('foobar', 'bar',       'baz');
    }

    public function operator__unary_operator_spaces($a, ...   $b)
    {
        $sample = 2;
        $c = $sample;

        $sample ++;
        $sample --;
        $sample = ~     $c;
    }

    /**
     * @deprecated
     * @see
     *
     * @param  string  $a
     * @throws \Exception
     * @throws \RuntimeException
     *
     * @return void
     *
     * @psalm-pure
     * @psalm-template T
     * @phpstan-pure
     * @phpstan-template T
     */
    public function phpdoc__phpdoc_separation($a) {}

    public function semicolon__space_after_semicolon()
    {
        for ($i = 0; ; $i++) {
        }
    }
}
