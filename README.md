# gsmservice-pl/messaging-sdk-php

Developer-friendly & type-safe Php SDK specifically catered to leverage *gsmservice-pl/messaging-sdk-php* API.

<div align="left">
    <a href="https://www.speakeasy.com/?utm_source=gsmservice-pl/messaging-sdk-php&utm_campaign=php"><img src="https://custom-icon-badges.demolab.com/badge/-Built%20By%20Speakeasy-212015?style=for-the-badge&logoColor=FBE331&logo=speakeasy&labelColor=545454" /></a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-blue.svg" style="width: 100px; height: 28px;" />
    </a>
</div>


<br /><br />
> [!IMPORTANT]
> This SDK is not yet ready for production use. To complete setup please follow the steps outlined in your [workspace](https://app.speakeasy.com/org/intermedia/gsmservice-pl). Delete this section before > publishing to a package manager.

<!-- Start Summary [summary] -->
## Summary

Messaging Gateway GSMService.pl: 
# Introduction

This document was created to explain the process of integration any application or system with the **GSMService.pl** SMS Gateway via the *REST API*. Currently, there are several ways to send messages with the GSMService.pl platform:

* Directly from the [https://bramka.gsmservice.pl](https://bramka.gsmservice.pl) website [User Panel](https://panel.gsmservice.pl)
* Via this *REST API* and provided *SDKs*
* Via the legacy (deprecated) versions API: *Webservices (SOAP)* and *HTTP* 
* Via the *MAIL2SMS* service

This document describes the possibilities offered by **REST API**.

> **We kindly ask you to read this documentation carefully before starting the integration. This will make the whole process easier and will help you avoid many problems.**

## Account signup and setup

Firstly, it is necessary to create your personal account at the GSMService.pl SMS Gateway platform if you haven't one and activate access to the API. To register a new account please [signup the form](https://panel.gsmservice.pl/rejestracja). After signing up and fully activation of an account you have to activate an access to the API.

To do it please use [this site](https://panel.gsmservice.pl/api) - fill the *New API Access* form with your preferred API login, set your API password, select which API standard you want to activate for this account (select **REST API** there). Optionally you can add IP adresses (or IP pool with CIDR notation) from which access to your API account will be possible. You can also set a callback address there to collect any messages status updates automatically. When a status of a messaga changes, the callback address will be called with passing parameters with new message status.

After setup an API access you will get an unique **API Access Token** - please write it down as there won't be possible to display it again (you will have the possibility to regenerate it only). This token will be required to authenticate all the requests made with API on your account.

## Authentication of API requests

All the endpoints of this REST API have to be authenticated using your API Access Token with one exception: */rest/ping* endpoint which doesn't need an authentication. 

To make an authenticated request you should add to all requests an ***Authorization* header** which you have generated in previous step:

```
Authorization: Bearer <YOUR_API_ACCESS_TOKEN>
```

## URLs to connect to API

Please use this SSL secured adresses to connect to REST API:

* ```https://api.gsmservice.pl/rest``` - for production system

* ```https://api.gsmservice.pl/rest-sandbox``` - for test system (Sandbox)

> **When calling our API, make sure you are using TLS version 1.2 or higher. Older versions are no longer supported.**

# SDK Client Libraries

For developers integrating SMS functionality into their app, we provide a convenient SDK Libraries.

Our SDKs allow you to quickly start interacting with the Gateway using your favorite programming language. Currently we support the following languages:

## PHP 8

To install PHP SDK issue the following command:

```shell
composer require gsmservice-pl/php-sdk
```
More information and documentation you can find at [GitHub](https://ddd.pl) 

## Typescript

To install Typescript SDK issue the following command:

### NPM

```
npm add <UNSET>
```

More information and documentation you can find at [GitHub](https://ddd.pl)
<!-- End Summary [summary] -->

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

To install the SDK first add the below to your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "github",
            "url": "<UNSET>.git"
        }
    ],
    "require": {
        "gsmservice-pl/messaging-sdk-php": "*"
    }
}
```

Then run the following command:

```bash
composer update
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically. Any manual changes added to internal files will be overwritten on the next generation. 
We look forward to hearing your feedback. Feel free to open a PR or an issue with a proof of concept and we'll do our best to include it in a future release. 

### SDK Created by [Speakeasy](https://www.speakeasy.com/?utm_source=gsmservice-pl/messaging-sdk-php&utm_campaign=php)
