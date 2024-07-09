1. **`name`**

   This method is optional. If not implemented, Relax will use the class name itself as the ruleset name.

2. **`rules`**

   Define the PHP-CS-Fixer rules you want to use.

   🧱 Resources:
   - https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst
   - https://github.com/kubawerlos/php-cs-fixer-custom-fixers

<br> <br>

```php
<?php

use PhpCsFixerCustomFixers\Fixer;
use Realodix\Relax\RuleSet\AbstractRuleSet;

class MyRuleSet extends AbstractRuleSet
{
    public function name(): string
    {
        // ...
    }

    public function rules(): array
    {
        return [
            '@PSR2' => true,
            'array_syntax' => [
                'syntax' => 'short'
            ],
            'blank_line_after_opening_tag' => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            Fixer\NoLeadingSlashInGlobalNamespaceFixer::name() => true,
+           Fixer\PhpdocNoSuperfluousParamFixer::name() => true,

            // ...
        ];
    }
}
```
