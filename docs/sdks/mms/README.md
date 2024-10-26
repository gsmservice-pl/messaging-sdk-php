# Mms
(*outgoing->mms*)

## Overview

### Available Operations

* [getPrice](#getprice) - Check the price of MMS Messages
* [send](#send) - Send MMS Messages

## getPrice

Check the price of single or multiple MMS messages at the same time before sending them. You can pass as a parameter `MmsMessage` object (for single message) or `array` of `MmsMessage` objects (for multiple messages). Each `MmsMessage` object has several properties, describing message parameters such as recipient phone number, content of the message, attachments, etc.
The method will accept maximum **50** messages in one call.

As a successful result an `GetMmsPriceResponse` object will be returned with `$prices` property containing array of `Price` objects. one object per each single message. You should check the `error` property of each message in a response body to make sure which were priced successfully and which finished with an error. Successfully priced messages will have `null` value of `error` property.

`GetMmsPriceResponse` object will include also `$headers` array with `X-Success-Count` (a count of messages which were processed successfully) and `X-Error-Count` (count of messages which were rejected) elements.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\MmsMessage(
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'my-id-1113',
        ),
        message: 'To jest treść wiadomości',
        attachments: [
            '<file_body in base64 format>',
        ],
        subject: 'To jest treść wiadomości',
        date: null,
    ),
];

$response = $sdk->outgoing->mms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                        | Type                                                                             | Required                                                                         | Description                                                                      |
| -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `$request`                                                                       | [Components\MmsMessage\|array](../../Models/Operations/GetMmsPriceRequestBody.md) | :heavy_check_mark:                                                               | The request object to use for the request.                                       |

### Response

**[?Operations\GetMmsPriceResponse](../../Models/Operations/GetMmsPriceResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 4XX, 5XX       | application/problem+json |

## send

Send single or multiple MMS messages at the same time. You can pass as a parameter `MmsMessage` object (for single message) or `array` of `MmsMessage` objects (for multiple messages). Each `MmsMessage` object has several properties, describing message parameters such recipient phone number, content of the message, attachments or scheduled sending date, etc. This method will accept maximum 50 messages in one call.

As a successful result a `SendMmsResponse` object will be returned with `$messages` property containing array of `Message` objects, one object per each single message. You should check the `statusCode` property of each message in a response body to make sure which were accepted by gateway (queued) and which were rejected. In case of rejection, `statusDescription` property will include a reason.

`SendMmsResponse` will also include `$headers` array with `X-Success-Count` (a count of messages which were processed successfully), `X-Error-Count` (count of messages which were rejected) and `X-Sandbox` (if a request was made in Sandbox or Production system) elements.

### Example Usage

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
        subject: 'To jest treść wiadomości',
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

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `$request`                                                                   | [Components\MmsMessage\|array](../../Models/Operations/SendMmsRequestBody.md) | :heavy_check_mark:                                                           | The request object to use for the request.                                   |

### Response

**[?Operations\SendMmsResponse](../../Models/Operations/SendMmsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 4XX, 5XX  | application/problem+json |