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

$request = new Components\SmsMessage(
    recipients: '+48999999999',
    message: 'This is SMS message content.',
    unicode: true,
);

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

$request = new Components\MmsMessage(
    recipients: '+48999999999',
    subject: 'This is a subject of the message',
    message: 'This is MMS message content.',
    attachments: '<file body in base64 format>',
);

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->