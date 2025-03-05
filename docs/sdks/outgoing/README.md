# Outgoing
(*outgoing*)

## Overview

### Available Operations

* [cancelScheduled](#cancelscheduled) - Cancel a scheduled messages
* [getByIds](#getbyids) - Get the messages details and status by IDs
* [list](#list) - Lists the history of sent messages

## cancelScheduled

Cancel messages using their `ids` which were scheduled to be sent at a specific time. You have to pass an `array` of the unique message IDs, which were returned after sending a message. This method will accept maximum 50 identifiers in one call. You can cancel only messages with *SCHEDULED* status.
 
As a successful result a `CancelMessagesResponse` object will be returned, with `$cancelledMessages` property containing array of `CancelledMessage` object. The `status` property of each `CancelledMessage` object will contain a status code of operation - `204` if a particular message was cancelled successfully and other code if an error occured.
 
`CancelMessagesResponse` object will also contain `$headers` array property where you can find `X-Success-Count` (a count of messages which were cancelled successfully), `X-Error-Count` (count of messages which were not cancelled) and `X-Sandbox` (if a request was made in Sandbox or Production system) elements.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->outgoing->cancelScheduled(
    ids: [
        43456,
    ]
);

if ($response->cancelledMessages !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `ids`                                                                                                        | array<*int*>                                                                                                 | :heavy_check_mark:                                                                                           | Array of Message IDs assigned by the system. The system will accept a maximum of 50 identifiers in one call. |

### Response

**[?Operations\CancelMessagesResponse](../../Models/Operations/CancelMessagesResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 404, 4XX  | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## getByIds

Check the current status and details of one or more messages using their `ids`. You have to pass an unique message *IDs* `array` containing message's id which details you want to fetch. This method will accept maximum 50 identifiers in one call.

As a successful result a `GetMessagesResponse` object will be returned containing `$messages` property with an `array` of `Message` objects, each object per single found message. `GetMessagesResponse` object will also contain `$headers` array property where you can find `X-Success-Count` (a count of messages which were found and returned correctly) and `X-Error-Count` (count of messages which were not found) elements.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->outgoing->getByIds(
    ids: [
        43456,
    ]
);

if ($response->messages !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `ids`                                                                                                        | array<*int*>                                                                                                 | :heavy_check_mark:                                                                                           | Array of Message IDs assigned by the system. The system will accept a maximum of 50 identifiers in one call. |

### Response

**[?Operations\GetMessagesResponse](../../Models/Operations/GetMessagesResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 404, 4XX  | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## list

Get the details and current status of all of sent messages from your account message history. This method supports pagination so you have to pass as parameters a `$page` value (number of page with messages which you want to access) and a `$limit` value (max of messages per page). Messages are fetched from the latest one. This method will accept maximum **50** as `$limit` parameter value.

As a successful result a `ListMessagesResponse` object will be returned containing `$messages` property with an `array` of `Message` objects, each object per single message. `ListMessagesResponse` will also contain `$headers` array property where you can find `X-Total-Results` (a total count of all messages which are available in history on your account), `X-Total-Pages` (a total number of all pages with results), `X-Current-Page` (A current page number) and `X-Limit` (messages count per single page) elements.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->outgoing->list(
    page: 1,
    limit: 10

);

if ($response->messages !== null) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   | Example                       |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `page`                        | *?int*                        | :heavy_minus_sign:            | Page number of results        | 1                             |
| `limit`                       | *?int*                        | :heavy_minus_sign:            | Number of results on one page | 10                            |

### Response

**[?Operations\ListMessagesResponse](../../Models/Operations/ListMessagesResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 404, 4XX  | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |