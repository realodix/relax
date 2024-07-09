## Advanced Configuration

You can find the full documentation on this page:
- [PHP-CS-Fixer: Config](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/config.rst)
- [PHP-CS-Fixer: Rules](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst)
- [MLocati: PHP-CS-Fixer Configurator](https://mlocati.github.io/php-cs-fixer-configurator)


```php
<?php

use PhpCsFixer\Finder;
use Realodix\Relax\Config;
use Vendor\Package\MyRuleSet;

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

return Config::create(new MyRuleSet)
    ->setRules($localRules)
    ->setFinder($finder)
    ->setRiskyAllowed(false)
    ->registerCustomFixers(/* ... */);
```
