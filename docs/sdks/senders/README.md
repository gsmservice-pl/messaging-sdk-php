# Senders
(*senders*)

## Overview

### Available Operations

* [list](#list) - List allowed senders names
* [add](#add) - Add a new sender name
* [delete](#delete) - Delete a sender name
* [setDefault](#setdefault) - Set default sender name

## list

Get a list of allowed senders defined in your account. The method doesn't get any parameters.

As a successful result a `ListSendersResponse` object will be returned with an array of `Sender` as `$senders` property, each object per single sender.

### Example Usage

<!-- UsageSnippet language="php" operationID="listSenders" method="get" path="/senders" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->senders->list(

);

if ($response->senders !== null) {
    // handle response
}
```

### Response

**[?Operations\ListSendersResponse](../../Models/Operations/ListSendersResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## add

Define a new allowed sender on your account. You should pass as parameter a `SenderInput` object with two properties: `sender` (defines sender name) and `description`. Please carefully fill this property with the extensive description of a sender name (what will be its use, what the name mean, etc).

As a successful result a `AddSenderResponse` object will be returned with a property `$sender` containing a `Sender` object with details and status of added sender name.

### Example Usage

<!-- UsageSnippet language="php" operationID="addSender" method="post" path="/senders" -->
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

$request = new Components\SenderInput(
    sender: 'Bramka SMS',
    description: 'This is our company name. It contains our registered trademark.',
);

$response = $sdk->senders->add(
    request: $request
);

if ($response->sender !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                        | Type                                                             | Required                                                         | Description                                                      |
| ---------------------------------------------------------------- | ---------------------------------------------------------------- | ---------------------------------------------------------------- | ---------------------------------------------------------------- |
| `$request`                                                       | [Components\SenderInput](../../Models/Components/SenderInput.md) | :heavy_check_mark:                                               | The request object to use for the request.                       |

### Response

**[?Operations\AddSenderResponse](../../Models/Operations/AddSenderResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## delete

Removes defined sender name from your account. This method accepts **sender name** as parameter. Sender name will be deleted immediately.

As a successful response a `DeleteSenderResponse` will be returned with `$statusCode` = *204* property.

### Example Usage

<!-- UsageSnippet language="php" operationID="deleteSender" method="delete" path="/senders/{sender}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->senders->delete(
    sender: 'Podpis'
);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                 | Type                      | Required                  | Description               | Example                   |
| ------------------------- | ------------------------- | ------------------------- | ------------------------- | ------------------------- |
| `sender`                  | *string*                  | :heavy_check_mark:        | Sender name to be removed | Podpis                    |

### Response

**[?Operations\DeleteSenderResponse](../../Models/Operations/DeleteSenderResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 401, 403, 404, 4XX  | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## setDefault

Set default sender name to one of the senders names already defined on your account. This method accepts a **sender name** parameter to set it as default on your account.

As a successful response a `SetDefaultSenderResponse` will be returned with `$statusCode` = **204** property.

### Example Usage

<!-- UsageSnippet language="php" operationID="setDefaultSender" method="patch" path="/senders/{sender}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->senders->setDefault(
    sender: 'Podpis'
);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   | Example                       |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `sender`                      | *string*                      | :heavy_check_mark:            | Sender name to set as default | Podpis                        |

### Response

**[?Operations\SetDefaultSenderResponse](../../Models/Operations/SetDefaultSenderResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 404                      | application/json         |
| Errors\ErrorResponse     | 400, 401, 403, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |