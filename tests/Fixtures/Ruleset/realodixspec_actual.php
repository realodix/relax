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
    public function __construct(
        public int $a,
        public ?int $b,
        public string $c
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

    public function realodixSpec()
    {
        $func = [is_array(null), is_int(null)];
        $class = [new EncodingFixer, new BracesFixer, new NoClosingTagFixer];
    }
}
