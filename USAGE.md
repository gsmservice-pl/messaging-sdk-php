<!-- Start SDK Example Usage [usage] -->
### Sending single SMS Message

This example demonstrates simple sending SMS message to a single recipient:

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\SmsMessage(
        recipients: [
            '+48999999999',
        ],
        message: 'To jest treść wiadomości',
        sender: 'Bramka SMS',
        type: Components\SmsType::SmsPro,
        unicode: true,
        flash: false,
        date: null,
    ),
];

$response = $sdk->outgoing->sms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```

### Sending single MMS Message

This example demonstrates simple sending MMS message to a single recipient:

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\MmsMessage(
        recipients: [
            '+48999999999',
        ],
        message: 'To jest treść wiadomości',
        attachments: [
            '<file_body in base64 format>',
        ],
        subject: 'To jest temat wiadomości',
        date: null,
    ),
];

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->