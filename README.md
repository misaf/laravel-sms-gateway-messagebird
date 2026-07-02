# Laravel SMS Gateway MessageBird Driver

MessageBird SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-messagebird
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=messagebird
SMS_GATEWAY_MESSAGEBIRD_ACCESS_KEY=your-access-key
```

```php
// config/services.php
'messagebird' => [
    'access_key' => env('SMS_GATEWAY_MESSAGEBIRD_ACCESS_KEY'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('messagebird')->send([
    'recipients' => ['09123456789'],
    'body'       => 'Hello',
]);
```

The payload is passed directly to MessageBird, so use the fields expected by the MessageBird API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('messagebird')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
