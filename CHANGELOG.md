# Changelog

# 5.0.1

- Fix Scout driver detection (read `scout.driver` instead of non-existent `scout.default`)
- Fix Octane server detection (read `octane.server` instead of non-existent `octane.default`)
- Fix route cache detection (use `App::routesAreCached()`, the old path contained spaces and never matched)

# 5.0.0

- Add Laravel 13 support with php 8.3
- Drop Laravel 12 support
- Update orchestra/testbench to ^11 and phpunit to ^12.5
- Support PHP 8.3–8.5

# 4.0.1

- Fix Scout driver detection (read `scout.driver` instead of non-existent `scout.default`)
- Fix Octane server detection (read `octane.server` instead of non-existent `octane.default`)
- Fix route cache detection (use `App::routesAreCached()`, the old path contained spaces and never matched)

# 4.0.0

- Add Laravel 12 support with php 8.3
- Drop Laravel 11 support
- Update orchestra/testbench to ^10 and phpunit to ^11.5
- Migrate phpunit configuration to PHPUnit 11, remove phpunit10.xml.dist
- Fix environment dependent tests
- Support PHP 8.3–8.5 (PHP requirement changed from ~8.3 to ^8.3)

# 3.1.2

- Fix Scout driver detection (read `scout.driver` instead of non-existent `scout.default`)
- Fix Octane server detection (read `octane.server` instead of non-existent `octane.default`)
- Fix route cache detection (use `App::routesAreCached()`, the old path contained spaces and never matched)

# 3.1.1

- Fix Laravel 11 version constraint (v3.1.0 accidentally excluded Laravel 11)
- Fix environment dependent LaravelViews test
- Support PHP 8.3–8.5 (PHP requirement changed from ~8.3 to ^8.3)

# 3.1.0

- Fix failing tests (environment dependent version checks)

# 3.0.0

- Add Laravel 11 support with php 8.3
- Drop all other Laravel and php versions

# 2.4.1

- Fix Scout driver detection (read `scout.driver` instead of non-existent `scout.default`)
- Fix Octane server detection (read `octane.server` instead of non-existent `octane.default`)
- Fix route cache detection (use `App::routesAreCached()`, the old path contained spaces and never matched)

# 2.4.0

- Add Laravel 10 support

# 2.3.0

- Run cronjob on every environment except local
- Throw error if uuid is not set

# 2.2.0

- Add ayda version output
- Show info that command is finished

# 2.1.3

- Fix guzzle 6 compatibility

# 2.1.2

- Add guzzle 6 compatibility

# 2.1.1

- Fix wrong formatted result array

# 2.1.0

- Set schedule only in production environment

# 2.0.0

- Add UUID to json
- Fixing issue with mail driver on laravel 6
- Fixing issue with session driver

# 1.0.0

First Version
