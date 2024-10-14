# Sms
(*outgoing->sms*)

## Overview

### Available Operations

* [getPrice](#getprice) - Check the price of SMS Messages
* [send](#send) - Send SMS Messages

## getPrice

Check the price of single or multiple SMS messages at the same time before sending them. You can pass as a parameter `SmsMessage` object (for single message) or `array` of `SmsMessage` objects (for multiple messages). Each `SmsMessage` object has several properties, describing message parameters such as recipient phone number, content of the message, type, etc.
The method will accept maximum **100** messages in one call.

As a successful result a `GetSmsPriceResponse` object will be returned with `$prices` property containing array of `Price` objects, one object per each single message. You should check the `error` property of each message in a response body to make sure which were priced successfully and which finished with an error. Successfully priced messages will have `null` value of `error` property.

`GetSmsPriceResponse` object will include also `$headers` array with `X-Success-Count` (a count of messages which were processed successfully) and `X-Error-Count` (count of messages which were rejected) elements.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\SmsMessage(
        recipients: new Components\PhoneNumberWithCid(
            nr: '+48999999999',
            cid: 'my-id-1113',
        ),
        message: 'To jest treść wiadomości',
        sender: 'Bramka SMS',
        type: Components\SmsType::SmsPro,
        unicode: true,
        flash: false,
        date: null,
    ),
];

$response = $sdk->outgoing->sms->getPrice(
    request: $request
);

if ($response->prices !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                        | Type                                                                             | Required                                                                         | Description                                                                      |
| -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `$request`                                                                       | [Components\SmsMessage\|array](../../Models/Operations/GetSmsPriceRequestBody.md) | :heavy_check_mark:                                                               | The request object to use for the request.                                       |

### Response

**[?Operations\GetSmsPriceResponse](../../Models/Operations/GetSmsPriceResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 4XX, 5XX       | application/problem+json |

## send

Send single or multiple SMS messages at the same time. You can pass as a parameter `SmsMessage` object (for single message) or `array` of `SmsMessage` objects (for multiple messages). Each `SmsMessage` object has several properties, describing message parameters such recipient phone number, content of the message, type or scheduled sending date, etc. This method will accept maximum 100 messages in one call.

As a successful result a `SendSmsResponse` object will be returned with an `array` with `$messages` property containing array of `Message` objects, one object per each single message. You should check the `statusCode` property of each message in a response body to make sure which were accepted by gateway (queued) and which were rejected. In case of rejection, `statusDescription` property will include a reason.

`SendSmsResponse` will also include `$headers` array with `X-Success-Count` (a count of messages which were processed successfully), `X-Error-Count` (count of messages which were rejected) and `X-Sandbox` (if a request was made in Sandbox or Production system) elements.

### Example Usage

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

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `$request`                                                                   | [Components\SmsMessage\|array](../../Models/Operations/SendSmsRequestBody.md) | :heavy_check_mark:                                                           | The request object to use for the request.                                   |

### Response

**[?Operations\SendSmsResponse](../../Models/Operations/SendSmsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 4XX, 5XX  | application/problem+json |