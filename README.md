# Laravel LaunchDarkly package

---
This package provides the LaunchDarkly PHP SDK in a Laravel ecosystem for an easy use with the framework.
It in includes the facade to use it in your code. And in memory mock to help you in your tests.

## Installation

You can install the package via composer:
```bash
composer require ocus/laravel-launchdarkly
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Ocus\LaravelLaunchDarkly\LaravelLaunchDarklyServiceProvider" --tag="launchdarkly-config"
```

You can add in you `.env` file the LaunchDarkly SDK key
```dotenv
LAUNCH_DARKLY_SDK_KEY="sdk-<your-sdk-key>"
```
## Usage

First to use it you have to implement the `Ocus\LaravelLaunchDarkly\Contracts\IsLaunchDarklyUser` interface in the model
that you what tu use as a LaunchDarkly user.

```php
/**
 * @return LDUser
 *
 * @see \LaunchDarkly\LDUserBuilder
 * @link https://docs.launchdarkly.com/sdk/features/user-config#php
 */
public function getLaunchDarklyUserAttribute(): \LaunchDarkly\LDUser
{
    return (new \LaunchDarkly\LDUserBuilder($this->getKey()))
        ->secondary(self::class)
        ->email($this->email)
        ->name($this->name)
        ->build();
}
```

### In the code

```php
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;

// Will return what you setup on your LaunchDarkly dashboard
LaunchDarkly::variation('your.flag.key', $user->launch_darkly_user);
```

### In routes

You can use the `launch-darkly` middleware in your routes definition:

```php
Route::middleware('launch-darkly:my-key,my-value')->get('/my-route', ...);
```

All value types are supported except json.

### In the tests

```php
use Ocus\LaravelLaunchDarkly\Facades\LaunchDarkly;

// Fake the LaunchDarkly feature requester with a in memory one
LaunchDarkly::fake();

// Add a value for a given flag key
LaunchDarkly::addFlagValue('your.flag.key', true);

// Will return true
LaunchDarkly::variation('your.flag.key', $user->launch_darkly_user);
```

## Testing

```bash
composer test
```

## License

The Apache License (Apache 2.0). Please see [License File](LICENSE.md) for more information.
