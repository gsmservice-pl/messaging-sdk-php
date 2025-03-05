<!-- Start SDK Example Usage [usage] -->
### Sending single SMS Message

This example demonstrates simple sending SMS message to a single recipient:

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();

$request = [
    new Components\SmsMessage(
        recipients: [
            '+48999999999',
        ],
        message: 'To jest treść wiadomości',
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

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();

$request = [
    new Components\MmsMessage(
        recipients: [
            '+48999999999',
        ],
        attachments: [
            '<file_body in base64 format>',
        ],
        subject: 'To jest temat wiadomości',
        message: 'To jest treść wiadomości',
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