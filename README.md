# Filament Radio Group (Maintained Fork)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/keytactic-io/filament-radio-group.svg?style=flat-square)](https://packagist.org/packages/keytactic-io/filament-radio-group)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/keytactic-io/filament-radio-group/run-tests.yml?label=tests)](https://github.com/keytactic-io/filament-radio-group/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/keytactic-io/filament-radio-group/code-style.yml?label=code%20style)](https://github.com/keytactic-io/filament-radio-group/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/keytactic-io/filament-radio-group.svg?style=flat-square)](https://packagist.org/packages/keytactic-io/filament-radio-group)

This package is a **maintained fork** of [`astersnake/filament-radio-group`](https://github.com/astersnake/filament-radio-group), originally created by [@astersnake](https://github.com/astersnake).  

It provides enhanced radio button group functionality for Filament, allowing for **icons, descriptions, and improved layout control**.

## 🚀 What's New in This Fork?

- 📌 **Updated for modern Laravel & Filament versions**
- 🛠 **Actively maintained & improved**
- 🔥 [Any new features you plan to add]

---

## 📦 Installation

Install via Composer:

```bash
composer require keytactic/filament-radio-group
```

## Usage

The filament-radio-group package provides a `RadioGroup` class, which you can use to construct a radio button group in your application.

```php
use keytactic\Filament\RadioGroup\RadioGroup;

RadioGroup::make('radio_group')
    ->options([
        'option_1' => 'Option 1',
        'option_2' => 'Option 2',
        'option_3' => 'Option 3',
    ])
    ->descriptions([
        'option_1' => 'Description for option 1',
        'option_2' => 'Description for option 2',
        'option_3' => 'Description for option 3',
    ])
    ->icons([ // heroicons
        'option_1' => 'clipboard-document-check',
        'option_2' => 'clipboard-document-check',
        'option_3' => 'clipboard-document-check',
    ])
    ->iconsColor([ // icon outline color
        'option_1' => 'text-primary-600',
        'option_2' => 'text-success-600',
        'option_3' => 'text-danger-600',
    ])
    ->borderColors([ // selected border color
        'option_1' => 'border-blue-500 dark:border-blue-400',
        'option_2' => 'border-success-500 dark:border-success-400',
    ])
    ->iconSize('w-8 h-8') // Custom icon size
    ->iconBackgroundRadius('rounded-full') // Custom icon background radius
    ->iconBackgroundColors([
        'option_1' => 'bg-blue-50 dark:bg-blue-800/30', // Custom background color for option 1
        'option_2' => 'bg-green-50 dark:bg-green-800/30', // Custom background color for option 2
    ])
    ->columns(3)
    ->required(),
```

In the example above, `RadioGroup::make('radio_group')` creates a new radio button group with the name 'radio_group'.

- The `options()` method takes an associative array where keys are option values and values are option labels.
- The `descriptions()` method takes an associative array where keys are option values and values are descriptions for options.
- The `icons()` method takes an associative array where keys are option values and values are icon names.
- The `iconsColor()` method is used to assign colors to the icons.

## Theming

If you are using a custom theme for Filament, you will need to add this package's views to your Tailwind CSS config.

```js
content: [
    ...
    "./vendor/keytactic/filament-radio-group/resources/views/**/*.blade.php",
],
```

## Full Compatibility

The filament-radio-group package is built on the original Filament radio field, which means it supports all the functionalities available from the base radio field. This includes but is not limited to labeling, setting a default value, and adding help text. The package simply extends these functionalities, providing more flexibility and customization options.

For more information on using the base radio field functionalities, please refer to the [Filament Documentation](https://filamentadmin.com/docs/2.x/forms/fields#radio).

## Testing

To run the tests for the package:

```bash
composer test
```

## Changelog

Please refer to the [CHANGELOG](CHANGELOG.md) for more information about the recent changes.

## Contributing

Your contributions are always welcome! Please see our [CONTRIBUTING](.github/CONTRIBUTING.md) guide for details.

## Security Vulnerabilities

If you discover any security vulnerabilities in this package, please follow our [security policy](../../security/policy) to report them.

## Credits

- [astersnake](https://github.com/astersnake)
- [All Contributors](../../contributors)

## License

This package is licensed under the MIT License (MIT). Please see the [License File](LICENSE.md) for more information.
