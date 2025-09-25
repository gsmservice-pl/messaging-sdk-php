# Accounts
(*accounts*)

## Overview

### Available Operations

* [get](#get) - Get account details
* [getSubaccount](#getsubaccount) - Get subaccount details

## get

Get current account balance and other details of your account. You can check also account limit and if account is main one. Main accounts have unlimited privileges and using [User Panel](https://panel.szybkisms.pl) you can create as many subaccounts as you need.
 
This method doesn't get any parameters. As a successful result an `GetAccountDetailsResponse` object will be returned with properties describing details of current account you are logged in to using API Access Token.

### Example Usage

<!-- UsageSnippet language="php" operationID="getAccountDetails" method="get" path="/account" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->accounts->get(

);

if ($response->accountResponse !== null) {
    // handle response
}
```

### Response

**[?Operations\GetAccountDetailsResponse](../../Models/Operations/GetAccountDetailsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 401, 403, 4XX            | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |

## getSubaccount

Check account balance and other details such subcredit balance of a subaccount. Subaccounts are additional users who can access your account services and the details. You can restrict access level and setup privileges to subaccounts using [user panel](https://panel.szybkisms.pl).

This method accepts an `userLogin` parameter. You should pass the full subaccount login to access its data. 

As a successful result a `GetSubaccountDetailsResponse` object will be returned with properties describing details of subaccount with provided login.

### Example Usage

<!-- UsageSnippet language="php" operationID="getSubaccountDetails" method="get" path="/account/{user_login}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()
    ->setSecurity(
        '<YOUR API ACCESS TOKEN>'
    )
    ->build();



$response = $sdk->accounts->getSubaccount(
    userLogin: 'some-login'
);

if ($response->accountResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                          | Type                                               | Required                                           | Description                                        | Example                                            |
| -------------------------------------------------- | -------------------------------------------------- | -------------------------------------------------- | -------------------------------------------------- | -------------------------------------------------- |
| `userLogin`                                        | *string*                                           | :heavy_check_mark:                                 | Login of the subaccount (user) to get the data for | some-login                                         |

### Response

**[?Operations\GetSubaccountDetailsResponse](../../Models/Operations/GetSubaccountDetailsResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 401, 403, 404, 4XX       | application/problem+json |
| Errors\ErrorResponse     | 5XX                      | application/problem+json |