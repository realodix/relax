<?php

use PhpCsFixer\Fixer\Basic\{EncodingFixer, BracesFixer, unused_import};
use PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer;

use function is_array;
use function is_int;

/**
 * @property       int      $a
 * @property-read  null|int $b
 * @property-write string   $c
 */
class RealodixSpec
{
    use Trait2, Trait3;
    use Trait1;

    /**
     * @var int
     */
    const C2 = 2;

    /** @var int */
    const C1 = 1;

    const C3 = 3;
    const C4 = 4;

    const C5 = 5;

    /** @var int */
    protected static $protStatProp;

    /**
     * @var int
     */
    public static $pubStatProp1;

    public $pubProp1;

    protected $protProp;

    public $pubProp2;

    private static $privStatProp;

    private $privProp;

    public static $pubStatProp2;

    public $pubProp3;

    public function __construct(
        public int $a,
        public ?int $b = 3600, // 1 hour...
        public string $c = 'Hello World!'
    ) {}

    /**
     * Lorem Ipsum
     *
     * Lorem Ipsum is simply dummy text of the printing and typesetting industry.
     */
    public function comment()
    {
        //
    }

    /**
     * @param null|string|boll $a comment
     * @return null|string|boll comment
     *
     * @throws \Exception
     */
    public function exampleMethod(null|string|boll $a = null): null|string|boll
    {
        $a = null;
        if ($a === null || ! $a === true) {
            echo 'null';
        }

        for ($i = 0; $i < 100; $i++) {
            if (true) {
                continue;
            }
        }

        $c = collect(\Illuminate\Support\Facades\Route::getRoutes()->get())
            ->map(fn(\Illuminate\Routing\Route $route) => $route->uri)
            ->reject(fn($value) => ! preg_match('/^[a-zA-Z\-]+$/', $value))
            ->unique()->sort()
            ->toArray();

        return null;
    }

    public function array()
    {
        return [
            '@PER-CS'     => true,
            '@PER-CS2.0'  => true,
            '@DoctrineAnnotation' => true,
            '@PHP84Migration' => true,
            '@PhpCsFixer'     => true,
            '@Symfony'        => true,
            '@Symfony:risky'  => true,
        ];
    }

    /** @test */
    public function test_a(): void {}

    /**
     * @test
     *
     * @dataProvider validTypesProvider
     */
    public function test_b(?int $a): void {}

    public function realodixSpec()
    {
        $func = [is_array(null), is_int(null)];
        $class = [new EncodingFixer, new BracesFixer, new NoClosingTagFixer];
    }
}