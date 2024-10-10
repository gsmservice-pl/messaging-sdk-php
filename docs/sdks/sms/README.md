# Sms
(*outgoing->sms*)

## Overview

### Available Operations

* [getPrice](#getprice) - Check the price of SMS Messages
* [send](#send) - Send SMS Messages

## getPrice

Check the price of single or multiple SMS messages at the same time before sending them. You have to pass as request body the `Sms` object (for single message) or `array` of `Sms` objects (for multiple messages). Each object has several properties, describing message parameters such recipient phone number, content of the message, type, etc. Please mind that some of them are required.
The system will accept maximum **100** messages in one call. If you need to check the price of larger volume of messages, please split it to several separate requests.

As a successful result an `array` of `Price` objects will be returned, one object per each single message. You should check the `error` property of each message in a response body to make sure which were priced successfully and which finished with an error. Successfully priced messages will have `null` value of `error` property. Response will also include meta-data headers: `X-Success-Count` (a count of messages which were processed successfully) and `X-Error-Count` (count of messages which were rejected).

If you send duplicated messages in one call, API will process such message only once. This request have to be authenticated using **API Access Token**.

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).


### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

$request = [
    new Components\Sms(
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

| Parameter                                                                 | Type                                                                      | Required                                                                  | Description                                                               |
| ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| `$request`                                                                | [Components\Sms\|array](../../Models/Operations/GetSmsPriceRequestBody.md) | :heavy_check_mark:                                                        | The request object to use for the request.                                |

### Response

**[?Operations\GetSmsPriceResponse](../../Models/Operations/GetSmsPriceResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 4XX, 5XX       | application/problem+json |

## send

Send single or multiple SMS messages at the same time. You have to pass as request body the `Sms` object (for single message) or `array` of `Sms` objects (for multiple messages). Each object has several properties, describing message parameters such recipient phone number, content of the message, type or scheduled sending date, etc. Please mind that some of them are required.
The system will accept maximum 100 messages in one call. If you need to send larger volume of messages, please split it to several separate requests.

As a successful result an `array` with `Message` objects will be returned, one object per each single message. You should check the `status_code` property of each message in a response body to make sure which were accepted by gateway (queued) and which were rejected. In case of rejection, `status_description` property will include a reason. Response will also include meta-data headers: `X-Success-Count` (a count of messages which were processed successfully), `X-Error-Count` (count of messages which were rejected) and `X-Sandbox` (if a request was made in Sandbox or Production system).

If you send duplicated messages in one call, API will process such message only once. This request have to be authenticated using **API Access Token**.

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;
use Gsmservice\Gateway\Models\Components;

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

| Parameter                                                             | Type                                                                  | Required                                                              | Description                                                           |
| --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- |
| `$request`                                                            | [Components\Sms\|array](../../Models/Operations/SendSmsRequestBody.md) | :heavy_check_mark:                                                    | The request object to use for the request.                            |

### Response

**[?Operations\SendSmsResponse](../../Models/Operations/SendSmsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 4XX, 5XX  | application/problem+json |