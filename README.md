# Realodix Relax

![PHPVersion](https://img.shields.io/badge/PHP-7.4%20|%20%5E8.0-777BB4.svg?style=flat-square)
![Packagist Version (custom server)](https://img.shields.io/packagist/v/realodix/relax)
![Build Status](../../actions/workflows/ci.yml/badge.svg)

**Realodix Relax** is built on top of [`PHP-CS-Fixer`][php-cs-fixer] and makes it simple to to sharing identical PHP CS Fixer rules across all of your projects without copy-and-pasting configuration files.

## Installation

You can install this package by using [composer](https://getcomposer.org/):

```sh
composer require --dev realodix/relax
```

## Running Relax

```sh
./vendor/bin/php-cs-fixer fix
```

For more details, see PHP-CS-Fixer [documentation](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/usage.rst).

## Configuring Relax

In your PHP CS Fixer configuration file, use the following contents:

```php
<?php

use Realodix\Relax\Config;

$localRules = [
    // ...
];

return Config::create('laravel')
    ->setRules($localRules);
```

#### Rulesets

A ruleset is a named list of rules that can be used to fix code style issues in your code. To use ruleset in your PHP code, you need to use the `Realodix\Relax\RuleSet\Sets\` namespace.

| Ruleset                   | Description |
| ------------------------- |-------------|
| [`laravel`][rs_laravel]   | Rules that follow the official Laravel coding standards |
| [`realodix`][rs_realodix] | Inherits `laravel` with some tweaks |
| [`spatie`][rs_spatie]     | The rule set used by Spatie |


#### Custom Fixers

- [kubawerlos/php-cs-fixer-custom-fixers](https://github.com/kubawerlos/php-cs-fixer-custom-fixers)

:bulb: They're all registered, so you don't need to re-register via `registerCustomFixers()`.

#### Finder Sets

By default, Relax will inspect all `.php` files in your project except those in the `vendor` directory.

| Preset | Description |
| -------- |-------------|
| [`Finder::base()`][doc_f_base] | The basic finder setup should be perfect for most PHP projects |
| [`Finder::laravel()`][doc_f_laravel] | Inherits `Finder::base()` with some specific tweaks to Laravel |

:bulb: By default, if finder is not set Relax will use `Finder::base()`.

[rs_laravel]: src/RuleSet/Sets/Laravel.php
[rs_realodix]: src/RuleSet/Sets/Realodix.php
[rs_spatie]: src/RuleSet/Sets/Spatie.php
[doc_f_base]: docs/finders.md#finderbase
[doc_f_laravel]: docs/finders.md#finderlaravel

## Advanced Configuration

Relax is built on top of [`PHP-CS-Fixer`][php-cs-fixer]. Therefore, you can make configurations just like you can do in PHP-CS-Fixer. For more details, see  [PHP-CS-Fixer: Config](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/config.rst) documentation and [MLocati: PHP-CS-Fixer Configurator](https://mlocati.github.io/php-cs-fixer-configurator).

```php
<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;

// You can add or override rule set
$localRules = [
    // Add rule
    'array_syntax' => true,

    // Add rule or override predefined rule
    'visibility_required' => true,

    // Override predefined rule
    'braces' => false,

    // Add custom fixers
    'CustomFixer/rule_1' => true,
    'CustomFixer/rule_2' => true,
];

$finder = Finder::create()
    ->in(__DIR__)
    ->ignoreDotFiles(false)
    ->exclude(['Bar'])
    ->notName('*.foo.php')
    ->append(['.php-cs-fixer.dist.php']);

return Config::create('laravel')
    ->setRules($localRules)
    ->setFinder($finder)
    ->setRiskyAllowed(false)
    ->registerCustomFixers(new \PhpCsFixerCustomFixers\CustomFixer());
```

If you wish to completely define rules locally without using existing rule sets, you can do that:

```php
<?php

use Realodix\Relax\Config;

$localRules = [
    '@PSR2'           => true,
    'array_syntax'    => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
];

return Config::create()
    ->setRules($localRules);
```

## Custom Rule Set

You can easily create your own rule set by extending the [`AbstractRuleSet`](src/RuleSet/AbstractRuleSet.php): class.

```php
<?php

use Realodix\Relax\RuleSet\AbstractRuleSet;

class MyRuleSet extends AbstractRuleSet
{
    // This method is optional. If not implemented, Relax will use
    // the class name itself as the ruleset name.
    public function name(): string
    {
        // ...
    }

    public function rules(): array
    {
        // ...
    }
}
```

And use it!

```php
<?php

use Realodix\Relax\Config;
use Vendor\Package\MyRuleSet;

$localRules = [
    // ...
];

return Config::create(new MyRuleSet())
    ->setRules($localRules);
```

## Troubleshooting

For general help and support join our [GitHub Discussions](../../discussions).

Please report bugs to the [GitHub Issue Tracker](../../issues).

## License

This package is licensed under the [MIT License](/LICENSE).

[php-cs-fixer]: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
