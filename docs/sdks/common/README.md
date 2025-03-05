# Common
(*common*)

## Overview

### Available Operations

* [ping](#ping) - Checks API availability and version

## ping

Check the API connection and the current API availability status. Also you will get the current API version number. The method doesn't accept any parameters.

As a successful result a `PingResponse` object will be returned.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Gsmservice\Gateway;

$sdk = Gateway\Client::builder()->build();



$response = $sdk->common->ping(

);

if ($response->pingResponse !== null) {
    // handle response
}
```

### Response

**[?Operations\PingResponse](../../Models/Operations/PingResponse.md)**

### Errors

| Error Type               | Status Code              | Content Type             |
| ------------------------ | ------------------------ | ------------------------ |
| Errors\ErrorResponse     | 400, 4XX                 | application/problem+json |
| Errors\ErrorResponse     | 503, 5XX                 | application/problem+json |