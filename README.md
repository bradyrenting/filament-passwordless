# Filament plugin for passwordless authentication

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bradyrenting/filament-passwordless.svg?style=flat-square)](https://packagist.org/packages/bradyrenting/filament-passwordless)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/bradyrenting/filament-passwordless/run-tests?label=tests)](https://github.com/bradyrenting/filament-passwordless/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/bradyrenting/filament-passwordless/Check%20&%20fix%20styling?label=code%20style)](https://github.com/bradyrenting/filament-passwordless/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bradyrenting/filament-passwordless.svg?style=flat-square)](https://packagist.org/packages/bradyrenting/filament-passwordless)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require bradyrenting/filament-passwordless
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-passwordless-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-passwordless-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-passwordless-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-passwordless = new BradyRenting\FilamentPasswordless();
echo $filament-passwordless->echoPhrase('Hello, BradyRenting!');
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
