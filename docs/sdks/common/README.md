# Common
(*common*)

## Overview

This section describes other usefull operations and tools

### Available Operations

* [ping](#ping) - Checks API availability and version

## ping

Check the API connection and the current API availability status. Also you will get the current API version number. The request doesn't contain a body or any parameters.

As a successful result a `PingResponse` object will be returned. This request doesn't need to be authenticated.

In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).

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
| Errors\ErrorResponse     | 400, 4XX, 503, 5XX       | application/problem+json |