# Client SDK

## Overview

Messaging Gateway GSMService.pl: Client class is used to initialize SDK environment.

Please initialize it this way:

```
$security = '<YOUR API ACCESS TOKEN>';
$sdk = Gateway\Client::builder()->setSecurity($security)->build();
```

If you want to use a Sandbox test system please initialize it as follows:

```
$sdk = Gateway\Client::builder()->setServer(Gateway\Client::SERVER_SANDBOX)->setSecurity($security)->build();
```