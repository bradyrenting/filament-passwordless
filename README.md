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

In your `config/filament.php` config, replace the default Login page with `\BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login::class`.

```php
'auth' => [
    'guard' => env('FILAMENT_AUTH_GUARD', 'web'),
    'pages' => [
        'login' => \BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login::class,
    ],
],
```

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

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
