## Finder Presets

#### **`Finder::base()`**
- Inherit [`PhpCsFixer\Finder`][pcf/finder] (Inspect all `.php` files except those in the `vendor` directory.).
- Ignores VCS files.
- Ignores dotfiles.
- Excludes directories: `node_modules`.
- Excludes files: `_ide_helper_actions.php`, `_ide_helper_models.php`, `_ide_helper.php`, `.phpstorm.meta.php`.

#### **`Finder::laravel()`**
- Inherit `Finder::base()`.
- Excludes directories: `bootstrap/cache`, `public`, `resources`, & `storage`.
- Excludes files: `*.blade.php`.

[pcf/finder]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/src/Finder.php
