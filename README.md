# Passwordless Authentication for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bradyrenting/filament-passwordless.svg?style=flat-square)](https://packagist.org/packages/bradyrenting/filament-passwordless)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bradyrenting/filament-passwordless/run-tests.yml?branch=main&style=flat-square&label=tests)](https://github.com/bradyrenting/filament-passwordless/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bradyrenting/filament-passwordless/fix-php-code-style-issues.yml?branch=main&style=flat-square&label=code%20style)](https://github.com/bradyrenting/filament-passwordless/actions?query=workflow%3A%22Fix+PHP+code+style+issues%22+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bradyrenting/filament-passwordless.svg?style=flat-square)](https://packagist.org/packages/bradyrenting/filament-passwordless)



Filament Passwordless is a package for [Filament](https://filamentphp.com/) that allows users to login without a password.

## Installation

You can install the package via composer:

```bash
composer require bradyrenting/filament-passwordless
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-passwordless-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-passwordless-views"
```

## Usage

Register the plugin in your Filament panel provider (the default filename is `app/Providers/Filament/AdminPanelProvider.php`):

```php
use use BradyRenting\FilamentPasswordless\FilamentPasswordlessPlugin;

// ...

    return $panel
        ->plugin(FilamentPasswordlessPlugin::make())
// ...
```

Note that you can remove any existing call to `->login()` in the panel's configuration because it will be provided by this plugin.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Brady Renting](https://github.com/bradyrenting)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.
