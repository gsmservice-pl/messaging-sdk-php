# GetSmsPriceRequestBody

To check the price of a single message or messages with the same content to multiple recipients, pass as method param a single `SmsMessage` object with the properties of this message. To check the price of multiple messages with different content at the same time, pass as method param an `array` of `SmsMessage` objects with the properties of each message.


## Supported Types

### `Components\SmsMessage`

```php
/**
* @var Components\SmsMessage
*/
Components\SmsMessage $value = /* values here */
```

### `array`

```php
/**
* @var array<Components\SmsMessage>
*/
array $value = /* values here */
```

