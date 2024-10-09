<!-- Start SDK Example Usage [usage] -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;
use Gsmservice\Gateway\Utils;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\Sms(
        recipients: [
            '+48999999999',
        ],
        message: 'To jest treść wiadomości',
        sender: 'Bramka SMS',
        type: Components\SmsType::SmsPro,
        unicode: true,
        flash: false,
        date: Utils\Utils::parseDateTime('2024-06-01T14:34:41+02:00'),
    ),
];

$response = $sdk->outgoing->sms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->