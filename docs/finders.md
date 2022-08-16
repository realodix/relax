## Finder Presets

#### **`Finder::base()`**
- Inherits [`PhpCsFixer\Finder`][pcf/finder] (Inspect all `.php` files except those in the `vendor` directory.).
- Includes PHP files in all folders.
- Ignores VCS files.
- Ignores dotfiles.
- Excludes `_ide_helper_actions.php`, `_ide_helper_models.php`, `_ide_helper.php`, `.phpstorm.meta.php` files.

#### **`Finder::laravel()`**
- Inherits `Finder::base()` preset.
- Excludes all files in the `bootstrap/cache`, `public`, `resources`, `storage` & `node_modules` directories.
- Excludes `*.blade.php` files.

[pcf/finder]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/src/Finder.php
