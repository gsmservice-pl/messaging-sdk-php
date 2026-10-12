# Outgoing.Mms

## Overview

### Available Operations

* [getPrice](#getprice) - Check the price of MMS Messages
* [send](#send) - Send MMS Messages

## getPrice

Check the price of single or multiple MMS messages at the same time before sending them. You can pass as a parameter `MmsMessage` object (for single message) or `array` of `MmsMessage` objects (for multiple messages). Each `MmsMessage` object has several properties, describing message parameters such as recipient phone number, content of the message, attachments, etc.
The method will accept maximum **50** messages in one call.

As a successful result an `GetMmsPriceResponse` object will be returned with `$prices` property containing array of `Price` objects. one object per each single message. You should check the `error` property of each message in a response body to make sure which were priced successfully and which finished with an error. Successfully priced messages will have `null` value of `error` property.

`GetMmsPriceResponse` object will include also `$headers` array with `X-Success-Count` (a count of messages which were processed successfully) and `X-Error-Count` (count of messages which were rejected) elements.

### Example Usage: bulk

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="bulk" -->
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
        recipients: '+48999999999',
        subject: 'This is a subject of the first message',
        message: 'This is first MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
    new Components\MmsMessage(
        recipients: '+48999888777',
        subject: 'This is a subject of the second message',
        message: 'This is second MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
];

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```
### Example Usage: bulk_cid

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="bulk_cid" -->
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
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'custom-id-A44445T',
        ),
        subject: 'This is a subject of the first message',
        message: 'This is first MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
    new Components\MmsMessage(
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999888777',
            cid: 'custom-id-F44445R',
        ),
        subject: 'This is a subject of the second message',
        message: 'This is second MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
];

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```
### Example Usage: multi

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="multi" -->
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
    recipients: [
        '+48999999999',
        '+48999888777',
    ],
    subject: 'This is a subject of the message',
    message: 'This is MMS message content.',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```
### Example Usage: multi_cid

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="multi_cid" -->
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
    recipients: [
        new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'custom-id-A44445T',
        ),
        new Components\PhoneNumberWithCid(
            nr: '+48999888777',
            cid: 'custom-id-F44445R',
        ),
    ],
    subject: 'This is a subject of the message',
    message: 'This is MMS message content',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```
### Example Usage: single

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="single" -->
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
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```
### Example Usage: single_cid

<!-- UsageSnippet language="php" operationID="getMmsPrice" method="post" path="/messages/mms/price" example="single_cid" -->
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
    recipients: new Components\PhoneNumberWithCid(
        nr: '+48999999999',
        cid: 'custom-id-A44445T',
    ),
    subject: 'This is a subject of the message',
    message: 'This is MMS message content',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                               | Type                                                                                                    | Required                                                                                                | Description                                                                                             |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                              | [Components\MmsMessage\|array<Components\MmsMessage>](../../Models/Operations/GetMmsPriceRequestBody.md) | :heavy_check_mark:                                                                                      | The request object to use for the request.                                                              |

### Response

**[?Operations\GetMmsPriceResponse](../../Models/Operations/GetMmsPriceResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 401, 405                 | application/problem+json |
| Errors\ErrorResponse     | 400, 415, 4XX            | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## send

Send single or multiple MMS messages at the same time. You can pass as a parameter `MmsMessage` object (for single message) or `array` of `MmsMessage` objects (for multiple messages). Each `MmsMessage` object has several properties, describing message parameters such recipient phone number, content of the message, attachments or scheduled sending date, etc. This method will accept maximum 50 messages in one call.

As a successful result a `SendMmsResponse` object will be returned with `$messages` property containing array of `Message` objects, one object per each single message. You should check the `statusCode` property of each message in a response body to make sure which were accepted by gateway (queued) and which were rejected. In case of rejection, `statusDescription` property will include a reason.

`SendMmsResponse` will also include `$headers` array with `X-Success-Count` (a count of messages which were processed successfully), `X-Error-Count` (count of messages which were rejected) and `X-Sandbox` (if a request was made in Sandbox or Production system) elements.

### Example Usage: bulk

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="bulk" -->
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
        recipients: '+48999999999',
        subject: 'This is a subject of the first message',
        message: 'This is first MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
    new Components\MmsMessage(
        recipients: '+48999888777',
        subject: 'This is a subject of the second message',
        message: 'This is second MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
];

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
### Example Usage: bulk_cid

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="bulk_cid" -->
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
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'custom-id-A44445T',
        ),
        subject: 'This is a subject of the first message',
        message: 'This is first MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
    new Components\MmsMessage(
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999888777',
            cid: 'custom-id-F44445R',
        ),
        subject: 'This is a subject of the second message',
        message: 'This is second MMS message content',
        attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
    ),
];

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
### Example Usage: multi

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="multi" -->
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
    recipients: [
        '+48999999999',
        '+48999888777',
    ],
    subject: 'This is a subject of the message',
    message: 'This is MMS message content.',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
### Example Usage: multi_cid

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="multi_cid" -->
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
    recipients: [
        new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'custom-id-A44445T',
        ),
        new Components\PhoneNumberWithCid(
            nr: '+48999888777',
            cid: 'custom-id-F44445R',
        ),
    ],
    subject: 'This is a subject of the message',
    message: 'This is MMS message content',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
### Example Usage: single

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="single" -->
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
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```
### Example Usage: single_cid

<!-- UsageSnippet language="php" operationID="sendMms" method="post" path="/messages/mms" example="single_cid" -->
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
    recipients: new Components\PhoneNumberWithCid(
        nr: '+48999999999',
        cid: 'custom-id-A44445T',
    ),
    subject: 'This is a subject of the message',
    message: 'This is MMS message content',
    attachments: 'R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
);

$response = $sdk->outgoing->mms->send(
    request: $request
);

if ($response->messages !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                           | Type                                                                                                | Required                                                                                            | Description                                                                                         |
| --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| `$request`                                                                                          | [Components\MmsMessage\|array<Components\MmsMessage>](../../Models/Operations/SendMmsRequestBody.md) | :heavy_check_mark:                                                                                  | The request object to use for the request.                                                          |

### Response

**[?Operations\SendMmsResponse](../../Models/Operations/SendMmsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 401, 405                 | application/problem+json |
| Errors\ErrorResponse     | 400, 403, 415, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |