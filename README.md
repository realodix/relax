# Realodix Relax

![PHPVersion](https://img.shields.io/badge/PHP-7.4%20|%208-777BB4.svg?style=flat-square)
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

For more details, see [PHP-CS-Fixer: Usage][pcf_doc_usage] documentation.

## Configuring Relax

In your PHP CS Fixer configuration file, use the following contents:

```php
<?php

use Realodix\Relax\Config;

return Config::create('realodix');
```

#### Rule Sets

Rule set defines a set of rules that can be used to fix code style issues in your code.

| Preset | Description |
| -------- |-------------|
| [`laravel`][rs_laravel] | The rule set by Laravel Pint |
| [`realodix`][rs_realodix] | Inherits `Laravel` with some tweaks |
| [`spatie`][rs_spatie] | The rule set used by Spatie |

#### Custom Fixers

- [`Laravel/laravel_phpdoc_alignment`][`fx_laravel_phpdoc_alignment`]
- [`Laravel/laravel_phpdoc_order`][`fx_laravel_phpdoc_order`]
- [`Laravel/laravel_phpdoc_separation`][`fx_laravel_phpdoc_separation`]
- [kubawerlos/php-cs-fixer-custom-fixers][fx_kubawerlos_custom-fixers]

:bulb: They're all registered, so you don't need to re-register via `registerCustomFixers()`.

#### Finder Sets

By default, Relax will inspect all `.php` files in your project except those in the `vendor` directory.

| Preset | Description |
| -------- |-------------|
| [`Finder::base()`][doc_f_base] | The basic finder setup should be perfect for most PHP projects |
| [`Finder::laravel()`][doc_f_laravel] | Inherits `Finder::base()` with some specific tweaks to Laravel |

:bulb: By default, if finder is not set Relax will use `Finder::base()`.

## Advanced Configuration

In case you only need some tweaks for specific projects, which won't deserve an own rule set - you may enable or disable specific rules.

```php
<?php

use Realodix\Relax\Config;
use Realodix\Relax\Finder;

// You can add or override rule set
$localRules = [
    // Adding a rule
    'array_syntax' => true,
    // Adding a rule or override predefined rules
    'binary_operator_spaces' => [
        'operators' => ['=>' => 'align_single_space_minimal']
    ],
    // Override predefined rules
    'ternary_operator_spaces' => false,
    // Adding custom rules
    'CustomFixer/rule_1' => true,
    'CustomFixer/rule_2' => true,
];

$finder = Finder::laravel(__DIR__.'Foo')
    ->ignoreDotFiles(false)
    ->exclude(['Bar'])
    ->notName('*.foo.php')
    ->append(['.php-cs-fixer.dist.php']);

return Config::create('realodix', $localRules)
    ->setRiskyAllowed(false)
    ->registerCustomFixers(new \PhpCsFixerCustomFixers\CustomFixer());
```

Relax is built on top of [`PHP-CS-Fixer`][php-cs-fixer]. Therefore, you may use any of its rules to fix code style issues in your project. For more details, see  [PHP-CS-Fixer: Config][pcf_doc_config] documentation and [MLocati: PHP-CS-Fixer Configurator][pcf_doc_config_mlocati].

If you want to completely define rules locally without using existing rule sets, you can do that:

```php
<?php

use Realodix\Relax\Config;

$localRules = [
    '@PSR2'           => true,
    'array_syntax'    => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
];

return Config::create($localRules);
```

## Custom Rule Set

You can easily create your own rule set by extending the [`AbstractRuleSet`][rs_abstract]: class.

```php
<?php

use Realodix\Relax\RuleSet\AbstractRuleSet;

final class MyRuleSet extends AbstractRuleSet
{
    /**
     * Optionally, set the rule set name.
     */
    // public string $name = 'Personal CS';

    protected function rules(): array
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

return Config::create(new MyRuleSet(), $localRules);
```

## Troubleshooting

For general help and support join our [GitHub Discussions](../../discussions).

Please report bugs to the [GitHub Issue Tracker](../../issues).

## License

This package is licensed under the [MIT License](/LICENSE).

[doc_f_base]: docs/finders.md#finderbase
[doc_f_laravel]: docs/finders.md#finderlaravel

[rs_abstract]: src/RuleSet/AbstractRuleSet.php
[rs_laravel]: src/RuleSet/Laravel.php
[rs_realodix]: src/RuleSet/Realodix.php
[rs_spatie]: src/RuleSet/Spatie.php
[`fx_laravel_phpdoc_alignment`]: src/Fixers/Laravel/LaravelPhpdocAlignmentFixer.php
[`fx_laravel_phpdoc_order`]: src/Fixers/Laravel/LaravelPhpdocOrderFixer.php
[`fx_laravel_phpdoc_separation`]: src/Fixers/Laravel/LaravelPhpdocSeparationFixer.php
[fx_kubawerlos_custom-fixers]: https://github.com/kubawerlos/php-cs-fixer-custom-fixers

[php-cs-fixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[pcf_doc_usage]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/usage.rst
[pcf_doc_config]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/config.rst
[pcf_doc_config_mlocati]: https://mlocati.github.io/php-cs-fixer-configurator
