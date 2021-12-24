# Ujumbe SMS implementation in Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kenmush/ujumbesms.svg?style=flat-square)](https://packagist.org/packages/kenmush/ujumbesms)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kenmush/ujumbesms/run-tests?label=tests)](https://github.com/kenmush/ujumbesms/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kenmush/ujumbesms/Check%20&%20fix%20styling?label=code%20style)](https://github.com/kenmush/ujumbesms/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kenmush/ujumbesms.svg?style=flat-square)](https://packagist.org/packages/kenmush/ujumbesms)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/UjumbeSMS.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/UjumbeSMS)

## Installation

You can install the package via composer:

```bash
composer require kenmush/ujumbesms
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="ujumbesms_without_prefix-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="ujumbesms_without_prefix-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="ujumbesms"
```

This is the contents of the published config file:

```php
return [
  'api_key'   => env('UJUMBE_API_KEY', 'bf4ca6e4-a1f0-4153-b361-6785991083c3'),
   'sender_id' => env("UJUMBE_SENDER_ID", 'UjumbeSMS'),
   'email'     => env("UJUMBE_EMAIL", '*****@youremail.com'),
   'prefix'     => 'ujumbe',
   'middleware' => ['web'],
];
```

## Usage

```php
use Kenmush\UjumbeSMS\UjumbeSMS;

UjumbeSMS::to([$phoneNumber])->message("Hi Kennedy ".Str::random(18))
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

- [Kennedy Mutisya](https://github.com/kenmush)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
