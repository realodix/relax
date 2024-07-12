# Relax - Centralized PHP-CS-Fixer Rule Config

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


## Running Relax

```sh
./vendor/bin/php-cs-fixer fix
```

For more details, see PHP-CS-Fixer [documentation](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/usage.rst).


## Configuring Relax

You can easily create your own rule set by extending the [`Realodix\Relax\RuleSet\AbstractRuleSet`](src/RuleSet/AbstractRuleSet.php) class and use it! See [docs/example_ruleset.md](docs/example_ruleset.md) for an example of how to create your own rule set.

```php
<?php

use Realodix\Relax\Config;
use Vendor\Package\MyRuleSet;

return Config::create(new MyRuleSet);
```

Sometimes for big dirty projects, you want to implement some local rules without implementing a ruleset, why not.

```php
$localRules = [
    // ...
];

Config::create()
    ->setRules($localRules);
```

For advanced configuration, see the [docs/advanced_configuration.md](docs/advanced_configuration.md)

### Presets

Preset defines a built-in set of rules that are ready to be used to fix code style issues in your code.

| Preset                  | Description |
| ------------------------|-------------|
| [`laravel`][rs_laravel] | Rules that follow the official Laravel coding standards |
| [`relax`][rs_relax]     | Inherits `laravel` with some tweaks |
| [`spatie`][rs_spatie]   | The rule set used by Spatie |

[rs_laravel]: src/RuleSet/Sets/Laravel.php
[rs_relax]: src/RuleSet/Sets/Realodix.php
[rs_spatie]: src/RuleSet/Sets/Spatie.php

```php
Config::create('laravel')
```

#### Finder Sets

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
