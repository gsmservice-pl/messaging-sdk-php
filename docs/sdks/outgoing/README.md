# Outgoing
(*outgoing*)

## Overview

### Available Operations

* [getByIds](#getbyids) - Get the messages details and status by IDs
* [cancelScheduled](#cancelscheduled) - Cancel a scheduled messages
* [list](#list) - Lists the history of sent messages

## getByIds

Check the current status and details of one or more messages using their `ids`. You have to pass the unique message *IDs* as path parameter, which were returned after sending a message. If you want to get the details of multiple messages at once, please separate their IDs with a comma. The system will accept maximum 50 identifiers in one call. If you need to get details of larger volume of messages, please split it to several separate requests.
    
As a successful result an array with `Message` objects will be returned, each object per single found message. Response will also include meta-data headers: `X-Success-Count` (a count of messages which were found and returned correctly) and `X-Error-Count` (count of messages which were not found).

If you pass duplicated IDs, API will return data of this message only once. This request have to be authenticated using **API Access Token**. 

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();



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

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `ids`                                                                                                                    | array<*int*>                                                                                                             | :heavy_check_mark:                                                                                                       | Message IDs assigned by the system (separated by comma). The system will accept a maximum of 50 identifiers in one call. |

### Response

**[?Operations\GetMessagesResponse](../../Models/Operations/GetMessagesResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ErrorResponse         | 400, 401, 403, 404, 4XX, 5XX | application/problem+json     |

## cancelScheduled

Cancel messages using their `ids` which were scheduled to be sent at a specific time. You have to pass the unique message IDs as path parameter, which were returned after sending a message. If you want to cancel multiple messages at once, please separate their IDs with a comma. The system will accept maximum 50 identifiers in one call. If you need to cancel larger volume of messages, please split it to several separate requests. You can cancel only messages with *SCHEDULED* status.
 
As a successful result an array with `CancelledMessage` objects will be returned, each object per single message id. The `status` property will contain a status code of operation - `204` if message was cancelled successfully and other code if an error occured with cancelling a given message. In case of an error, an `error` property will contain `ErrorResponse` object with the details of an error.
 
Response will also include meta-data headers: `X-Success-Count` (a count of messages which were cancelled successfully), `X-Error-Count` (count of messages which were not cancelled) and `X-Sandbox` (if a request was made in Sandbox or Production system).
 
If you pass duplicated message IDs in one call, API will process them only once. This request have to be authenticated using **API Access Token**.

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();



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

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `ids`                                                                                                                    | array<*int*>                                                                                                             | :heavy_check_mark:                                                                                                       | Message IDs assigned by the system (separated by comma). The system will accept a maximum of 50 identifiers in one call. |

### Response

**[?Operations\CancelMessagesResponse](../../Models/Operations/CancelMessagesResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ErrorResponse         | 400, 401, 403, 404, 4XX, 5XX | application/problem+json     |

## list

Get the details and current status of all of sent messages from your account message history. This endpoint supports pagination so you have to pass as query parameters a `page` value (number of page with messages which you want to access) and a `limit` value (max of messages per page). Messages are fetched from the latest one. The system will accept maximum **50** as `limit` parameter value. If you need to get details of larger volume of messages, please access them with next pages.
    
As a successful result an array with `Message` objects will be returned, each object per single message. Response will also include meta-data headers: `X-Total-Results` (a total count of all messages which are available in history on your account), `X-Total-Pages` (a total number of all pages with results), `X-Current-Page` (A current page number) and `X-Limit` (messages count per single page). This request have to be authenticated using **API Access Token**. 

A response contains also a special `Link` header which includes *URIs* to access next, previous, first and last page with messages (which complies with [RFC 5988](https://www.rfc-editor.org/rfc/rfc5988)). 

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).


### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();



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

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ErrorResponse         | 400, 401, 403, 404, 4XX, 5XX | application/problem+json     |