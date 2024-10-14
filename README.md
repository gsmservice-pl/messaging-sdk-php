[![Packagist Version](https://img.shields.io/packagist/v/gsmservice-pl/messaging-sdk-php)](https://packagist.org/packages/gsmservice-pl/messaging-sdk-php)
[![GitHub License](https://img.shields.io/github/license/gsmservice-pl/messaging-sdk-php)](https://github.com/gsmservice-pl/messaging-sdk-php/blob/main/LICENSE)
[![Static Badge](https://img.shields.io/badge/built_by-Speakeasy-yellow)](https://www.speakeasy.com/?utm_source=gsmservice-pl/messaging-sdk-php&utm_campaign=php)
# GSMService.pl Messaging REST API SDK for PHP

This package includes Messaging SDK for PHP (>8.2) to send SMS & MMS messages directly from your app via https://bramka.gsmservice.pl messaging platform.

## Additional documentation:

A documentation of all methods and types is available below in section [Available Resources and Operations
](#available-resources-and-operations).

Also you can refer to the [REST API documentation](https://api.gsmservice.pl/rest/) for additional details about the basics of this SDK.
<!-- No Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents

* [SDK Installation](#sdk-installation)
* [SDK Example Usage](#sdk-example-usage)
* [Available Resources and Operations](#available-resources-and-operations)
* [Error Handling](#error-handling)
* [Server Selection](#server-selection)
<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "gsmservice-pl/messaging-sdk-php"
```
<!-- End SDK Installation [installation] -->
## Requeirements:
- Minimal PHP version: 8.2
<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Sending single SMS Message

This example demonstrates simple sending SMS message to a single recipient:

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
<!-- End SDK Example Usage [usage] -->

<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [accounts](docs/sdks/accounts/README.md)

* [get](docs/sdks/accounts/README.md#get) - Get account details
* [getSubaccount](docs/sdks/accounts/README.md#getsubaccount) - Get subaccount details


### [common](docs/sdks/common/README.md)

* [ping](docs/sdks/common/README.md#ping) - Checks API availability and version

### [incoming](docs/sdks/incoming/README.md)

* [list](docs/sdks/incoming/README.md#list) - List the received SMS messages
* [getByIds](docs/sdks/incoming/README.md#getbyids) - Get the incoming messages by IDs

### [outgoing](docs/sdks/outgoing/README.md)

* [getByIds](docs/sdks/outgoing/README.md#getbyids) - Get the messages details and status by IDs
* [cancelScheduled](docs/sdks/outgoing/README.md#cancelscheduled) - Cancel a scheduled messages
* [list](docs/sdks/outgoing/README.md#list) - Lists the history of sent messages

#### [outgoing->sms](docs/sdks/sms/README.md)

* [getPrice](docs/sdks/sms/README.md#getprice) - Check the price of SMS Messages
* [send](docs/sdks/sms/README.md#send) - Send SMS Messages

### [senders](docs/sdks/senders/README.md)

* [list](docs/sdks/senders/README.md#list) - List allowed senders names
* [add](docs/sdks/senders/README.md#add) - Add a new sender name
* [delete](docs/sdks/senders/README.md#delete) - Delete a sender name
* [setDefault](docs/sdks/senders/README.md#setdefault) - Set default sender name

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\SDKException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `get` method throws the following exceptions:

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 401, 403, 4XX, 5XX       | application/problem+json |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$security = '<YOUR API ACCESS TOKEN>';

$sdk = Gateway\Client::builder()->setSecurity($security)->build();

try {
    $response = $sdk->accounts->get(

    );

    if ($response->accountResponse !== null) {
        // handle response
    }
} catch (Errors\ErrorResponseThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\SDKException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

## Server Selection

### Select Server by Name

You can override the default server globally by passing a server name to the `server: str` optional parameter when initializing the SDK client instance. The selected server will then be used as the default on the operations that use it. This table lists the names associated with the available servers:

| Name | Server | Variables |
| ----- | ------ | --------- |
| `prod` | `https://api.gsmservice.pl/rest` | None |
| `sandbox` | `https://api.gsmservice.pl/rest-sandbox` | None |



### Override Server URL Per-Client

The default server can also be overridden globally by passing a URL to the `server_url: str` optional parameter when initializing the SDK client instance. For example:
<!-- End Server Selection [server] -->

<!-- Placeholder for Future Speakeasy SDK Sections -->

# Development

## Maturity

This SDK is in continuous development and there may be breaking changes between a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically. Any manual changes added to internal files will be overwritten on the next generation. 
We look forward to hearing your feedback. Feel free to open a PR or an issue with a proof of concept and we'll do our best to include it in a future release. 
