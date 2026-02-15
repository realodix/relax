# Relax - PHP-CS-Fixer Custom Rule Sets

![PHPVersion](https://img.shields.io/badge/PHP-7.4%20|%20%5E8.0-777BB4.svg?style=flat-square)
![Packagist Version (custom server)](https://img.shields.io/packagist/v/realodix/relax)
![Build Status](../../actions/workflows/ci.yml/badge.svg)

**Relax** is built on top of [`PHP-CS-Fixer`](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) and makes it easy to provide a standardized way to apply coding standards across multiple projects, ensuring consistency and adherence to best practices.

By using predefined rulesets, it simplifies the setup process and allows teams to quickly integrate PHP-CS-Fixer into their development workflow.

## Installation

You can install this package by using [composer](https://getcomposer.org/):

```sh
composer require --dev realodix/relax
```


## Running

```sh
./vendor/bin/php-cs-fixer fix
```


## Configuration

```php
use Realodix\Relax\Config;

return Config::create()
    ->setRules([
        '@Realodix/Laravel' => true,
    ]);
```

or using the original PHP-CS-Fixer way

```php
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder)->in(__DIR__);

return (new Config)
    ->registerCustomRuleSets([
        new \Realodix\Relax\Rulesets\Laravel,
    ])
    ->setRules([
        '@Realodix/Laravel' => true,
    ])
    ->setFinder($finder)
;
```

### # Rule Sets

- `@Realodix/Laravel` - `Realodix\Relax\Rulesets\Laravel`

  Rules that follow the official Laravel coding standards.

- `@Realodix/Relax` - `Realodix\Relax\Rulesets\Relax`

  Laravel based with a few tweaks.

### # Finder Sets

By default, Relax will inspect all `.php` files in your project except those in the `vendor` directory.

| Method    | Description |
| --------- |-------------|
| [`Finder::base()`][doc_f_base] | The basic finder setup should be perfect for most PHP projects |
| [`Finder::laravel()`][doc_f_laravel] | Inherits `Finder::base()` with some specific tweaks to Laravel |

:bulb: By default, if finder is not set Relax will use `Finder::base()`.

[doc_f_base]: docs/finders.md#finderbase
[doc_f_laravel]: docs/finders.md#finderlaravel


## Troubleshooting

For general help and support join our [GitHub Discussions](../../discussions).

Please report bugs to the [GitHub Issue Tracker](../../issues).


## License

This package is licensed under the [MIT License](/LICENSE).
