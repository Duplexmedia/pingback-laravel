# Laravel system information

## Installation

You can install the package via composer:

```bash
composer require duplexmedia/pingback
```

Set the following environment variables with correct values.<br>
To get the UUID, run the following command

```bash
php artisan pingback:uuid
```

```text
- PINGBACK_DIAGNOSTIC_SERVER_URL=https://xxx.tld
- PINGBACK_API_KEY=XXX
- PINGBACK_UUID=
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
