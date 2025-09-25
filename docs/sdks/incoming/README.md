# Incoming
(*incoming*)

## Overview

### Available Operations

* [list](#list) - List the received SMS messages
* [getByIds](#getbyids) - Get the incoming messages by IDs

## list

Get the details of all received messages from your account incoming messages box. This method supports pagination so you have to pass as parameters `$page` value (number of page with received messages which you want to access) and a `$limit` value (max of received messages per page). Messages are fetched from the latest one. This method will accept maximum **50** as `$limit` parameter value.

As a successful result a `ListIncomingMessagesResponse` object will be returned with an array of `IncomingMessage` as `$incomingMessages` property, each object per single received message. `ListIncomingMessagesResponse` object will contain also a `$headers` array property where you can find `X-Total-Results` (a total count of all received messages which are available in incoming box on your account), `X-Total-Pages` (a total number of all pages with results), `X-Current-Page` (A current page number) and `X-Limit` (messages count per single page) elements.

### Example Usage

<!-- UsageSnippet language="php" operationID="listIncomingMessages" method="get" path="/incoming" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->incoming->list(
    page: 1,
    limit: 10

);

if ($response->incomingMessages !== null) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   | Example                       |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `page`                        | *?int*                        | :heavy_minus_sign:            | Page number of results        | 1                             |
| `limit`                       | *?int*                        | :heavy_minus_sign:            | Number of results on one page | 10                            |

### Response

**[?Operations\ListIncomingMessagesResponse](../../Models/Operations/ListIncomingMessagesResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 404, 4XX  | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## getByIds

Get the details of one or more received messages using their `ids`. This method accepts an `array` of the unique incoming message *IDs*, which were given while receiving a messages. The method will accept maximum 50 identifiers in one call.

As a successful result a `GetIncomingMessagesResponse` object will be returned with an array of `IncomingMessage` as `$incomingMessages` property, each object per single received message. `GetIncomingMessagesResponse` object will contain also a `$headers` array property where you can find `X-Success-Count` (a count of incoming messages which were found and returned correctly) and `X-Error-Count` (count of incoming messages which were not found) elements.

### Example Usage

<!-- UsageSnippet language="php" operationID="getIncomingMessages" method="get" path="/incoming/{ids}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->incoming->getByIds(
    ids: [
        43456,
    ]
);

if ($response->incomingMessages !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `ids`                                                                                                        | array<*int*>                                                                                                 | :heavy_check_mark:                                                                                           | Array of Message IDs assigned by the system. The system will accept a maximum of 50 identifiers in one call. |

### Response

**[?Operations\GetIncomingMessagesResponse](../../Models/Operations/GetIncomingMessagesResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 404, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |